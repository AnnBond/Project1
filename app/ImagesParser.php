<?php
namespace App;

class ImagesParser implements Parser
{
    protected $path;
    protected $images;

    /**
     * ImagesParser constructor. set path
     * @param string $path
     */
    public function __construct(string $path)
    {
        $this->path = $path;
    }

    /**
     * go through all image files in path directory and store each in array
     * @return array
     */
    public function getFiles(): array
    {
        $fileList = glob($this->path . "/*.{jpg,gif,png}", GLOB_BRACE);

        foreach ($fileList as $file) {
            list($width, $height) = getimagesize("$file");

            $this->images[basename($file)][] = basename($file);
            $this->images[basename($file)][] = $width;
            $this->images[basename($file)][] = $height;
        }

        return $this->images;
    }
}



