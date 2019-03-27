<?php

require __DIR__ . '/vendor/autoload.php';

use App\ImagesParser;
use App\ImagesPrinter;

$time = new App\ExecutionTime();
$time->start();

$imageParser = new ImagesParser('resources/files');
$imageInfo = new ImagesPrinter($imageParser->getFiles());

echo $imageInfo->print();

$time->end();
echo $time->getExecutionTime();