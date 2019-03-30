<?php
namespace App;

use InvalidArgumentException;

abstract class Image
{
    protected $name;
    protected $path;
    protected $width;
    protected $height;
    protected $mimeString;
    protected $resource;

    /**
     * Image constructor.
     * @param $path
     */
    public function __construct($path)
    {
        $this->path = $path;
        $this->mimeString = mime_content_type($path);
    }

    /**
     * @return mixed
     */
    private function getName() : string
    {
        $this->name = basename($this->path);

        return $this->name;
    }

    /**
     * @return mixed
     */
    private function getWidth() : string
    {
        $data = getimagesize($this->path);
        $this->width = $data[0];

        return $this->width;
    }

    /**
     * @return mixed
     */
    private function getHeight() : string
    {
        $data = getimagesize($this->path);
        $this->height = $data[1];

        return $this->height;
    }

    /**
     * print information about image
     */
    public function getInfo()
    {
        echo "File name: ". $this->getName() . ";";
        echo " Width: ".  $this->getWidth() . ";";
        echo " Height: ". $this->getheight() . ";";
        echo "\n";
    }

    /**
     * @return resource
     */
    protected function getResource() : resource
    {
        switch ($this->mimeString) {
            case 'image/jpeg':
                $this->resource = imagecreatefromjpeg($this->path);
                break;
            case 'image/png':
                $this->resource = imagecreatefrompng($this->path);
                break;
            case 'image/gif':
                $this->resource = imagecreatefromgif($this->path);
                break;
            default:
                throw new InvalidArgumentException("File type {$this->resource} is not supported.");
        }

        return $this->resource;

    }

    /**
     * @param int $degrees
     * @return bool
     */
    abstract public function rotate(int $degrees) : bool;

}