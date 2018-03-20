<?php
namespace Models\Validation\Validators;

class RequiredValidator extends AbstractSingleMessageValidator {

    const VALIDATOR_ABBR = 'required';

    public function checkValidity($value) {
        return !empty($value);
    }
}