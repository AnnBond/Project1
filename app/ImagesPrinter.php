<?php

namespace App;


class ImagesPrinter implements Printer {

    protected $images;

    public function __construct($images)
    {
        $this->images = $images;
    }

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



