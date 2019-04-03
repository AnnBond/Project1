<?php
namespace App;

abstract class Image
{
    protected $path;
    protected $resource;

    /**
     * @return string
     */
    public function getName() : string
    {
        return basename($this->path);
    }

    /**
     * @return string
     */
    public function getWidth() : string
    {
        $data = getimagesize($this->path);
        return $data[0];

    }

    /**
     * @return string
     */
    public function getHeight() : string
    {
        $data = getimagesize($this->path);
        return $data[1];

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