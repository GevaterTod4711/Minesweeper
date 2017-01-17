<?php
return [
    'settings' => [
        'displayErrorDetails' => true, // set to false in production
        'addContentLengthHeader' => false, // Allow the web server to send the content-length header

        // Renderer settings
        'renderer' => [
            'template_path' => __DIR__ . '/../templates/',
        ],

        // Monolog settings
        'logger' => [
            'name' => 'slim-app',
            'path' => __DIR__ . '/../logs/app.log',
            'level' => \Monolog\Logger::DEBUG,
        ],

        // Twig settings
        'views' => [
            'twig' => [
                'template_path' => ROOTPATH.'templates'.DS,
                'environment' => [
                    'auto_reload' => false,
                    'cache_path' => ROOTPATH.'cache'.DS.'twig'.DS,
                ],
            ],
        ],
    ],
];
