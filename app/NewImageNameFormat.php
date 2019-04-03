<?php
namespace App;

class NewImageNameFormat extends Image
{
    protected $image;

    /**
     * NewImageNameFormat constructor.
     * @param Image $image
     */
    public function __construct(Image $image)
    {
        $this->image = $image;
    }

    /**
     * @return string
     */
    public function getName() : string
    {
        $name = $this->isNewFormat($this->image->getName());

        if(!empty($name)) {
            return $name[0];
        }

        return $this->image->getName();
    }

    /**
     * @return string
     */
    public function getWidth() : string
    {
        $width = $this->isNewFormat($this->image->getName());

        if(!empty($width)) {
            return $width[2];
        }

        return $this->image->getWidth();
    }

    /**
     * @return string
     */
    public function getHeight() : string
    {
        $height = $this->isNewFormat($this->image->getName());

        if(!empty($height)) {
            return $height[3];
        }

        return $this->image->getHeight();
    }

    /**
     * Check name new format
     * @param $name
     * @return array
     */
    private function isNewFormat($name) : array
    {
       preg_match("/^(.*)_(\d+)x(\d+).*/", $name, $matches);

        return  $matches;
    }

    /**
     * @param int $degrees
     * @return bool
     */
    public function rotate(int $degrees) : bool
    {
        return $this->image->rotate($degrees);
    }

    /**
     * Create a new image from file depends of format
     * @return resource
     */
    protected function getResource()
    {
        return $this->image->getResource();
    }
}