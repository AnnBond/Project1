<?php
namespace App;

use InvalidArgumentException;

class ImagesParser implements Parser
{
    private $path;
    private $images;

    /**
     * ImagesParser constructor.
     * @param string $path
     * @throws InvalidArgumentException
     */
    public function __construct(string $path)
    {
        if (!is_dir($path)) {
            throw new InvalidArgumentException("Directory is not exists");
        }

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
            if (exif_imagetype($file) == IMAGETYPE_JPEG) {
                $image = new JpgImage($file);
            } elseif (exif_imagetype($file) == IMAGETYPE_PNG) {
                $image = new PngImage($file);
            } elseif (exif_imagetype($file) == IMAGETYPE_GIF) {
                $image = new GifImage($file);
            } else {
                die("Sorry, we don't support this format.\n");
            }

            $this->images[] = $image;
        }

        return $this->images;
    }
}



