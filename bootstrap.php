<?php

require 'vendor/autoload.php';

define('DS', DIRECTORY_SEPARATOR); // Shortcut
define('PUBLICPATH', __DIR__.DS.'public'.DS);
define('ROOTPATH', realpath(__DIR__).DS);

session_start();

$loader = new Twig_Loader_Filesystem(ROOTPATH.'templates'.DS);

$twig = new Twig_Environment($loader, array(
    'cache' => ROOTPATH.DS.'cache'.DS.'twig',
    'autoload' => true,
));
