<?php
namespace App;

abstract class Image
{
    protected $name;
    protected $path;
    protected $width;
    protected $height;
    protected $resource;

    /**
     * Image constructor.
     * @param $path
     */
    public function __construct($path)
    {
        $this->path = $path;
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
    abstract public function getResource();

    /**
     * @param int $degrees
     * @return bool
     */
    abstract public function rotate(int $degrees) : bool;

}