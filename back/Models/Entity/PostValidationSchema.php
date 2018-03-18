<?php
return [
    'title' => [
        'required',
    ],
    'text' => [
        'required',
    ],
    'author' => [
        'required',
        'enum' => [
            'admin@fake-blog.com',
            'fake-user@fake-blog.com'
        ]
    ]
];