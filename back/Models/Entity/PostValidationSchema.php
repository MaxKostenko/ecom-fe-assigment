<?php
use Models\Validation\Validators\RequiredValidator;
use Models\Validation\Validators\EmailValidator;
use Models\Validation\Validators\EnumValidator;

return [
    'title' => [
        RequiredValidator::class,
    ],
    'text' => [
        RequiredValidator::class,
    ],
    'author' => [
        RequiredValidator::class,
        EmailValidator::class,
        EnumValidator::class => [
            'admin@fake-blog.com',
            'fake-user@fake-blog.com'
        ]
    ]
];