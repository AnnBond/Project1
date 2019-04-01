<?php
namespace App;

class PngImage extends Image
{
    /**
     * Rotate PNG Images
     * @param int $degrees
     * @return bool
     */
    public function rotate(int $degrees) : bool
    {
        $source = $this->getResource();
        $rotate = imagerotate($source, $degrees, 0);
        imagesavealpha($rotate, true);

        return imagepng($rotate,$this->path);
    }

    /**
     * @inheritdoc
     * @return resource
     */
    protected function getResource()
    {
       return imagecreatefrompng($this->path);
    }
}