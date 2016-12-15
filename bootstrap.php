<?php

require 'vendor/autoload.php';

session_start();

$loader = new Twig_Loader_Filesystem('templates');

$twig = new Twig_Environment($loader, array(
    'cache' => 'cache'.DIRECTORY_SEPARATOR.'twig',
    'autoload' => true,
));
