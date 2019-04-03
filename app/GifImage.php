<?php
namespace App;

class GifImage extends Image
{
    /**
     * GifImage constructor.
     * @param $path
     */
    public function __construct($path)
    {
        $this->path = $path;
    }

    /**
     * Rotate GIF Images
     * @param int $degrees
     * @return bool
     */
    public function rotate(int $degrees) : bool
    {
        $source = $this->getResource();
        $rotate = imagerotate($source, $degrees, 0);

        return imagegif($rotate,$this->path);
    }

    /**
     * @inheritdoc
     * @return resource
     */
    protected function getResource()
    {
        return imagecreatefromgif($this->path);
    }
}