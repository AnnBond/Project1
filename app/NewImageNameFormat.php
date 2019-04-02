<?php
namespace App;

class NewImageNameFormat
{
    protected $image;
    protected $name;
    protected $width;
    protected $height;

    /**
     * ImageProxy constructor.
     * @param Image $image
     */
    public function __construct(Image $image)
    {
        $this->image = $image;
    }

    /**
     * @return mixed
     */
    public function getName() : string
    {
        $name = $this->isNewFormat($this->image->getName());

        if(!empty($name)) {
            $this->name = $name[0];
        } else {
            $this->name = $this->image->getName();
        }

        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getWidth() : string
    {
        $width = $this->isNewFormat($this->image->getName());

        if(!empty($width)) {
            $this->width = $width[2];
        } else {
            $this->width = $this->image->getWidth();
        }

        return $this->width;
    }

    /**
     * @return mixed
     */
    public function getHeight() : string
    {
        $height = $this->isNewFormat($this->image->getName());

        if(!empty($height)) {
            $this->height = $height[3];
        } else {
            $this->height = $this->image->getHeight();
        }

        return $this->height;
    }


    private function isNewFormat($name)
    {
       preg_match("/^(.*)_(\d+)x(\d+).*/", $name, $matches);

        return  $matches;
    }

    public function rotate(int $degrees) {
        return $this->image->rotate($degrees);
    }

}