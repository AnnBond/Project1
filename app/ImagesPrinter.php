<?php
namespace App;

class ImagesPrinter implements Printer {

    protected $images;

    /**
     * ImagesPrinter constructor. set images
     * @param array $images
     */
    public function __construct(array $images)
    {
        $this->images = $images;
    }

    /**
     * output info about images
     */
    public function print()
    {
        foreach ($this->images as $image) {
            $image->rotate(180);

            echo "File name: ". $image->getName() . ";";
            echo " Width: ".  $image->getWidth() . ";";
            echo " Height: ". $image->getheight() . ";";
            echo "\n";
        }
    }
}



