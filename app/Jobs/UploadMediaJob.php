<?php

namespace App\Jobs;

use App\DTO\MediaDTO;
use App\Models\Setting;
use App\Services\MediaService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Http\UploadedFile;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Cache;

class UploadMediaJob implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    private MediaDTO $file;
    private string $directory;
    private ?Model $model;
    private array $options;


    /**
     * Create a new job instance.
     *
     * @param MediaDTO $file
     * @param string $directory
     * @param Model|null $model
     * @param array $options
     */
    public function __construct(MediaDTO $file, string $directory, Model $model = null, array $options = [])
    {
        $this->file = $file;
        $this->directory = $directory;
        $this->model = $model;
        $this->options = $options;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(): void
    {
        $preparedFile = new UploadedFile(
            $this->file->getPath(),
            $this->file->getName()
        );

        // If a model is passed, add the media file to the model's media collection
        if ($this?->model) {
            $this->model->addMedia($preparedFile)
                ->usingFileName($preparedFile->hashName())
                ->toMediaCollection($this->directory);
        } else {
            // Otherwise, upload the file to the server and update a related setting, if applicable
            $path = MediaService::file($this->file->getPath())
                ->directory($this->directory)
                ->fileName($this->file->getName())
                ->uploadFromTemp();

            // If a 'key' option is provided, update the corresponding setting or create a new one
            if (array_key_exists('key', $this->options)) {
                $setting = Setting::firstOrNew(['key' => $this->options['key']]);
                if ($setting->value) {
                    MediaService::deleteFileFromBucket($setting->value);
                }
                $setting->value = $path;
                $setting->save();

                Cache::forget('settings');
            }
        }
    }
}
