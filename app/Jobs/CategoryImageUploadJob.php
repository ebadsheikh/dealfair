<?php

namespace App\Jobs;

use App\DTO\MediaDTO;
use App\Models\Category;
use App\Services\MediaService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CategoryImageUploadJob implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    private MediaDTO $mediaDTO;
    private string $directory;

    private Category $category;

    /**
     * Create a new job instance.
     */
    public function __construct(MediaDTO $mediaDTO, string $directory, Category $category)
    {
        $this->mediaDTO = $mediaDTO;
        $this->directory = $directory;
        $this->category = $category;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $imageUrl = MediaService::file($this->mediaDTO->getPath())
            ->directory($this->directory)
            ->fileName($this->mediaDTO->getName())
            ->uploadFromTemp();

        $this->category->update([
            'image_url' => $imageUrl
        ]);
    }
}
