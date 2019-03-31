<?php
namespace App;

use UnexpectedValueException;

class ImageFactory
{

    public static function create($file)
    {
        preg_match("/.(\w+)$/", $file, $matches);

        $product = "App\\" . ucfirst($matches[1] . "Image");

        if (class_exists($product)) {
            return new  $product($file);
        } else {
            throw new UnexpectedValueException("Undefined product");
        }
    }
}