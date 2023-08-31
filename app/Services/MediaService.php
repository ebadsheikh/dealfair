<?php

namespace App\Services;

use App\DTO\MediaDTO;
use App\Helpers\GlobalHelper;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class MediaService
{
    private string $directory = '/';
    private string $file;
    private string $fileName;
    private array $mediaDTO;

    /**
     * Set the file to upload.
     *
     * @param string $file The file to upload
     *
     * @return self The current instance of the MediaService
     */
    public static function file(string $file): self
    {
        $mediaService = new static();
        $mediaService->file = $file;

        return $mediaService;
    }

    public static function uploadTempFile(UploadedFile $file): MediaDTO
    {
        $filename = $file->getClientOriginalName();
        Storage::putFileAs('tmp', $file, $filename);
        $tmpFilePath = Storage::path('tmp/' . $filename);
        return (new MediaDTO($tmpFilePath, $filename));
    }


    /**
     * Set the directory to upload the file to.
     *
     * @param string $directory The directory to upload the file to
     *
     * @return self The current instance of the MediaService
     */
    public function directory(string $directory): self
    {
        $this->directory = $directory;
        return $this;
    }

    /**
     * Sets the filename of the file being uploaded.
     *
     * @param string $fileName The name of the file to be uploaded
     *
     * @return self Returns the current instance of the MediaService
     */
    public function fileName(string $fileName): self
    {
        $this->fileName = $fileName;
        return $this;
    }

    /**
     * Upload the file to the specified directory.
     *
     * @return string
     */
    public function upload(): string
    {
        $path = Storage::disk('s3')->put($this->directory, $this->file);
        return Storage::disk('s3')->url($path);
    }

    /**
     * Uploads the file from temporary storage to the specified directory.
     *
     * @return string The URL of the uploaded file
     */
    public function uploadFromTemp(): string
    {
        $path = Storage::disk('s3')->putFile($this->directory, $this->file);

        // Delete the temporary file if it exists
        if (Storage::disk('tmp')->exists($this->fileName)) {
            Storage::disk('tmp')->delete($this->fileName);
        }

        return Storage::disk('s3')->url($path);
    }

    public static function deleteFileFromBucket(string $url): void
    {
        $path = GlobalHelper::getPathFromUrl($url);

        if (Str::contains($path, 'default_site_settings')) {
            return;
        }

        if (Storage::disk('s3')->exists($path)) {
            Storage::disk('s3')->delete($path);
        }
    }
}
