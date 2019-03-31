<?php
namespace App;

class JpgImage extends Image
{
    /**
     * Rotate JPG Images
     * @param int $degrees
     * @return bool
     */
    public function rotate(int $degrees) : bool
    {
        $source = $this->getResource();
        $rotate = imagerotate($source, $degrees, 0);

        return imagejpeg($rotate,$this->path);
    }

    public function getResource()
    {
        return imagecreatefromjpeg($this->path);
    }

}