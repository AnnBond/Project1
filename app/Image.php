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
    public function getName() : string
    {
        $this->name = basename($this->path);

        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getWidth() : string
    {
        $data = getimagesize($this->path);
        $this->width = $data[0];

        return $this->width;
    }

    /**
     * @return mixed
     */
    public function getHeight() : string
    {
        $data = getimagesize($this->path);
        $this->height = $data[1];

        return $this->height;
    }

    /**
     * Create a new image from file depends of format
     * @return resource
     */
    abstract protected function getResource();

    /**
     * @param int $degrees
     * @return bool
     */
    abstract public function rotate(int $degrees) : bool;

}