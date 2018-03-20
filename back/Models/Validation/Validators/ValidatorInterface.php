<?php
namespace Models\Validation\Validators;

interface ValidatorInterface {
    public function validate($value);

    public function getErrorText();

}