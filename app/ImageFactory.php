<?php
namespace App;

use UnexpectedValueException;

class ImageFactory
{
    /**
     * Factory for creating Images depends of format
     * @param $file
     * @return Image
     */
    public static function create(string $file) : Image
    {
        preg_match("/.(\w+)$/", $file, $matches);

        $image = "App\\" . ucfirst($matches[1] . "Image");

        if (class_exists($image)) {
            $image = new $image($file);
            $proxy = new NewImageNameFormat($image);

            return $proxy;
        } else {
            throw new UnexpectedValueException("Undefined image");
        }
    }
}