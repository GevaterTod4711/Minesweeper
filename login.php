<?php

require 'bootstrap.php';

if (isset($_SESSION['user'])) {
    header("Location: main.php");
}

$template_data = array();

if (!empty($_POST['name']) && !empty($_POST['password'])) {

    $db = Database::getInstance();
    $user = filter_input(INPUT_POST, 'user');
    $passwd = filter_input(INPUT_POST, 'password');

    $hash = $db->getPasswordHash($user);

    if (password_verify($passwd, $hash)) {
        $template_data['result'] = 'Login erfolgreich.';

        $student = new Student($user);
        $student->setNote($db->getNote($user));

        $_SESSION['user'] = $student;

        header('Location: userdata.php');
    } else {
        $template_data['result'] = 'Login fehlgeschlagen';
    }
}

$template = $twig->load('login.tpl.html');

echo $template->render($template_data);
