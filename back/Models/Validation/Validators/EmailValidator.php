<?php
namespace Models\Validation\Validators;

class EmailValidator extends AbstractSingleMessageValidator {

    const VALIDATOR_ABBR = 'email';

    public function checkValidity($value) {
        return empty($value) ? true : filter_var($value, FILTER_VALIDATE_EMAIL);
    }
}