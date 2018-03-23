<?php
namespace Models\FileStorage;

use Slim\Http\UploadedFile;
use Models\Utils\ImageConverter;

class ImageStorage extends FileStorage
{
    public function addFile(UploadedFile $file)
    {
        $converter = new ImageConverter();
        $basename = bin2hex(random_bytes(8));
        $filename = sprintf('%s.%0.8s', $basename, 'png');
        $isOk = $converter->run($file->file, $this->destinationDir . DIRECTORY_SEPARATOR . $filename);
        return $isOk ? $filename : NULL;
    }

}