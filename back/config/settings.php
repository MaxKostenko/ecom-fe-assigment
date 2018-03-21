<?php
use Models\Store\JsonStore;

return [
    'settings' => [
        'store' => [
            'class' => JsonStore::class,
            'config' => [
                'filesPath' => __DIR__ . '/../../var/'
            ]
        ],
        'imageStorage' => [
            'destinationDir' => __DIR__ . '/../../public/static/images'
        ],
        'displayErrorDetails' => true,
    ]
];