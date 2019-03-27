<?php
namespace App;

class Image
{
    protected $name;
    protected $path;
    protected $width;
    protected $height;
    protected $type;

    public function __construct($path)
    {
        $this->path = $path;
        $this->setHeight();
        $this->setWidth();
        $this->setName();
        $this->setType();
    }

    /**
     * @return string
     */
    public function setName()
    {
        return $this->name = basename($this->path);
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function setWidth()
    {
        $data = getimagesize($this->path);
        return $this->width = $data[0];
    }

    /**
     * @return mixed
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @return mixed
     */
    public function setHeight()
    {
        $data = getimagesize($this->path);
        return $this->height = $data[1];
    }

    /**
     * @return mixed
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @return mixed
     */
    public function getPath(){
        return $this->path;
    }

    /**
     * @return string
     */
    public function setType()
    {
        return $this->type = mime_content_type($this->path);
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * rotate image depends of degrees
     * @param $degrees
     */
    public function rotate($degrees)
    {
        if (exif_imagetype($this->path) == IMAGETYPE_JPEG || exif_imagetype($this->path) == IMAGETYPE_JPG) {
            $source = imagecreatefromjpeg($this->path);
            $rotate = imagerotate($source, $degrees, 0);
            imagejpeg($rotate,$this->path);
        }

        if (exif_imagetype($this->path) == IMAGETYPE_PNG) {
            $source = imagecreatefrompng($this->path);
            $rotate = imagerotate($source, $degrees, 0);
            imagesavealpha($rotate, true);
            imagepng($rotate,$this->path);
        }

        if (exif_imagetype($this->path) == IMAGETYPE_GIF) {
            $source = imagecreatefromgif($this->path);
            $rotate = imagerotate($source, $degrees, 0);
            imagegif($rotate,$this->path);
        }
    }
}