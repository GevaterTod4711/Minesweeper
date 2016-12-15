<?php

session_start();

require 'vendor/autoload.php';

$tpl = new Template();
$tpl->assign('{$title}', 'Register');

$tpl->display('templates/login.tpl.html');
