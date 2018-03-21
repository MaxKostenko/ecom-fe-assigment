<?php
namespace Models\FileStorage;

use Slim\Http\UploadedFile;

class FileStorage implements FileStorageInterface
{
    private $destinationDir;

    public function __construct($settings) {

        $this->destinationDir = $settings['destinationDir'];
    }

    public function addFile(UploadedFile $file)
    {
        if ($file->getError() === UPLOAD_ERR_OK) {
            return $this->moveUploadedFile($this->destinationDir, $file);
        }

        return NULL;
    }

    protected function moveUploadedFile($directory, UploadedFile $uploadedFile)
    {
        $extension = pathinfo($uploadedFile->getClientFilename(), PATHINFO_EXTENSION);
        $basename = bin2hex(random_bytes(8));
        $filename = sprintf('%s.%0.8s', $basename, $extension);

        $uploadedFile->moveTo($directory . DIRECTORY_SEPARATOR . $filename);

        return $filename;
    }
}