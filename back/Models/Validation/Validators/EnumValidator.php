<?php
namespace Models\Validation\Validators;

class EnumValidator extends AbstractSingleMessageValidator {

    const VALIDATOR_ABBR = 'enum';

    public function checkValidity($value) {
        if(!is_array($this->options))
            return false;
        return empty($value) ? true : in_array($value, $this->options);
    }
}