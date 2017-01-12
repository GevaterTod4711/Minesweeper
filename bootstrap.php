<?php

require 'vendor/autoload.php';

define('DS', DIRECTORY_SEPARATOR); // Shortcut
define('PUBLICPATH', __DIR__.DS.'public'.DS);
define('ROOTPATH', realpath(__DIR__).DS);

session_start();

$client = new Google_Client();
$client->setApplicationName("Minesweeper");
$client->setDeveloperKey("AIzaSyC2RP5WVNpEQ8u39uZmNIloq06VB0sA19g");
$service = new Google_Service_Books($client);

$loader = new Twig_Loader_Filesystem(ROOTPATH.'templates'.DS);

$twig = new Twig_Environment($loader, array(
    'cache' => ROOTPATH.DS.'cache'.DS.'twig',
    'auto_reload' => true,
));
