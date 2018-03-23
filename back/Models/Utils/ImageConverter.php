<?php

namespace Models\Utils;

class ImageConverter
{

    public function __construct($filePath = NULL)
    {
        if ($filePath) {
            $this->run($filePath, $filePath);
        }
    }

    static public function getResourceByFile($fileType, $filePath)
    {
        switch ($fileType) {
            case IMAGETYPE_GIF:
                return imagecreatefromgif($filePath);
            case IMAGETYPE_JPEG:
                return imagecreatefromjpeg($filePath);
            case IMAGETYPE_PNG:
                return imagecreatefrompng($filePath);
            case IMAGETYPE_WBMP:
                return imagecreatefromwbmp($filePath);
        }
        return NULL;
    }

    public function run($filePath, $saveTo)
    {
        list($width, $height, $fileType) = getimagesize($filePath);
        $resource = static::getResourceByFile($fileType, $filePath);
        if ($resource) {
            $newImageResource = imagecreatetruecolor(300, 300);
            if ($width > $height) {
                $isOk = imagecopyresized(
                    $newImageResource,
                    $resource,
                    0, 0,
                    round(($width - $height) / 2), 0,
                    300, 300,
                    $height, $height
                );
            } else {
                $isOk = imagecopyresized(
                    $newImageResource,
                    $resource,
                    0, 0,
                    0, round(($height - $width) / 2),
                    300, 300,
                    $width, $width
                );
            }
            if ($isOk) {
                $isOk = imagefilter($newImageResource, IMG_FILTER_GAUSSIAN_BLUR);
                if ($isOk) {
                    return imagepng($newImageResource, $saveTo, 0);
                }
            }
        }
        return NULL;
    }
}