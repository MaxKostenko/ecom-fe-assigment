<?php
namespace Models\Validation\Validators;

use Slim\Http\UploadedFile;

class ImageValidator extends AbstractSingleMessageValidator {

    const VALIDATOR_ABBR = 'image';

    /**
     * @param UploadedFile $image
     * @return bool
     */

    public function checkValidity($image) {

        if($image instanceof UploadedFile) {
            if ($image->getError() === UPLOAD_ERR_OK) {
                $fileType = @exif_imagetype($image->file);
                return in_array($fileType, $this->options['type']);
            }
            return false;
        }
        return true;
    }
}