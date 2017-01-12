<?php

require '../bootstrap.php';

if (isset($_SESSION['user'])) {
    header("Location: main.php");
}
$template = $twig->load('login.tpl.html');

$template_data = array(
    'title' => 'Login',
);

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


echo $template->render($template_data);
