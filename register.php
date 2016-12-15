<?php

session_start();

require 'lib/Template.class.php';

$tpl = new Template();
$tpl->assign('{$title}', 'Register');
$tpl->display('templates/register.tpl.html');
?>