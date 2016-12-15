<?php

session_start();

require 'lib/Template.class.php';
$tpl = new Template();
$tpl->assign('{$title}', 'Register');
<<<<<<< HEAD
$tpl->display('templates/register.tpl.html');
=======
$tpl->display('templates/login.tpl.html');

>>>>>>> 61c017caae61989692b84f739cac7d1e40e8239f
?>