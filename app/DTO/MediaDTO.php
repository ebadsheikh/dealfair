<?php

namespace App\DTO;

class MediaDTO
{
    private string $path;
    private string $name;

    /**
     * Create a new MediaDTO instance.
     *
     * @param string $path The path of the media file.
     * @param string $name The name of the media file.
     */
    public function __construct(string $path, string $name)
    {
        $this->path = $path;
        $this->name = $name;
    }

    /**
     * Set the path of the media file.
     * @param string $path
     */
    public function setPath(string $path): void
    {
        $this->path = $path;
    }

    /**
     * Set the name of the media file.
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * Get the path of the media file.
     *
     * @return string The path of the media file.
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * Get the name of the media file.
     *
     * @return string The name of the media file.
     */
    public function getName(): string
    {
        return $this->name;
    }
}
