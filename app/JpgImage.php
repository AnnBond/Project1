<?php
namespace App;

class JpgImage extends Image
{

    /**
     * JpgImage constructor.
     * @param $path
     */
    public function __construct($path)
    {
        $this->path = $path;
    }

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

    /**
     * @inheritdoc
     * @return resource
     */
    protected function getResource()
    {
        return imagecreatefromjpeg($this->path);
    }

}