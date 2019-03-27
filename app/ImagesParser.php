<?php

namespace App;


class ImagesParser implements Parser {

    protected $path;
    protected $images;

    public function __construct($path)
    {
        $this->path = $path;
    }

    public function getFiles()
    {
        $fileList = glob($this->path."/*.{jpg,gif,png}", GLOB_BRACE);

        foreach($fileList as $file) {
            list($width, $height) = getimagesize("$file");

            $this->images[basename($file)][] = basename($file);
            $this->images[basename($file)][] = $width;
            $this->images[basename($file)][] = $height;
        }

        return $this->images;
    }

}



