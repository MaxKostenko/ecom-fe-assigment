<?php
use Models\Validation\Validators\RequiredValidator;
use Models\Validation\Validators\LengthValidator;

return [
    'name' => [
        RequiredValidator::class,
        LengthValidator::class => [
            'min' => 4
        ]
    ]
];
