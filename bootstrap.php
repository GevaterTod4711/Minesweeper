<?php

if (PHP_SAPI == 'cli-server') {
    // To help the built-in PHP dev server, check if the request was actually for
    // something which should probably be served as a static file
    $url  = parse_url($_SERVER['REQUEST_URI']);
    $file = __DIR__ . $url['path'];
    if (is_file($file)) {
        return false;
    }
}

require 'vendor/autoload.php';

define('DS', DIRECTORY_SEPARATOR); // Shortcut
define('PUBLICPATH', __DIR__.DS.'public'.DS);
define('ROOTPATH', realpath(__DIR__).DS);

session_start();

// Instantiate the app
$settings = require 'config/settings.php';

$app = new \Slim\App($settings);

// Set up dependencies
require 'config/dependencies.php';

// Register middleware
require 'config/middleware.php';

// Register routes
require 'config/routes.php';
