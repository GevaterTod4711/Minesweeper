<?php

session_start();

if (isset($_SESSION['user'])) {
    header("Location: main.php");
}

require('lib/Database.class.php');
require('lib/Template.class.php');

$tpl = new Template();
$tpl->assign('{$title}', 'Login');

if (!empty($_POST['name']) && !empty($_POST['password'])) {

    $db = Database::getInstance();
    $user = filter_input(INPUT_POST, 'user');
    $passwd = filter_input(INPUT_POST, 'password');

    $hash = $db->getPasswordHash($user);

    if (password_verify($passwd, $hash)) {
	$tpl->assign('{$result}', 'Login erfolgreich.');

	$student = new Student($user);
	$student->setNote($db->getNote($user));

	$_SESSION['user'] = $student;

	header('Location: userdata.php');
    } else {
	$tpl->assign('{$result}', 'Login fehlgeschlagen');
    }
}


//execute at the end
$tpl->display('templates/login.tpl.html');
?>