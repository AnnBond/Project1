<?php
require __DIR__ . '/vendor/autoload.php';

use App\ExecutionTime;
use App\ImagesParser;
use App\ImagesPrinter;

try {
    $time = new ExecutionTime();
    $time->start();

    $imageParser = new ImagesParser('resources/files');
    $imageInfo = new ImagesPrinter($imageParser->getFiles());

    echo $imageInfo->print();

    $time->end();
    echo $time->getExecutionTime();

} catch (Exception $e) {
    echo 'Exception: ', $e->getMessage(), "\n";
}