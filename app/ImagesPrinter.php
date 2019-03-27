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
        foreach($this->images as $name => $info) {
            echo "File name: ". $name . ";";
            echo " Width: $info[1]" . ";";
            echo " Height: $info[2]" . ";";
            echo "\n";
        }
    }
}



