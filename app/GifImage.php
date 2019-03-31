<?php
namespace App;

class GifImage extends Image
{
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

    public function getResource()
    {
        return imagecreatefromgif($this->path);
    }
}