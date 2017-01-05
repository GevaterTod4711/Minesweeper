<?php
require 'lib/Database.class.php';
$name = filter_input(INPUT_POST,'user',FILTER_SANITIZE_SPECIAL_CHARS);
$passwort = filter_input(INPUT_POST, 'pw', FILTER_UNSAFE_RAW);

$hash = crypt($passwort);
$dbh = Database::getInstance();
$return = $dbh->registerUser($name,$hash);

session_start();

require 'lib/Template.class.php';

$tpl = new Template();
$tpl->assign('{$title}', 'Register');
$tpl->display('templates/register.tpl.html');
?>