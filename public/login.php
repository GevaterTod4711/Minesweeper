<?php

require '../bootstrap.php';

if (isset($_SESSION['user'])) {
    header("Location: main.php");
}
$template = $twig->load('login.tpl.html');

$template_data = array(
    'title' => 'Login',
);
//$openid = new LightOpenID('localhost:8080');
if (!empty($_POST['name']) && !empty($_POST['password'])) {

    $db = Minesweeper\Database::getInstance();
    $name = filter_input(INPUT_POST, 'name');
    $password = filter_input(INPUT_POST, 'password');
    $user = $db->getUserByName($name);

    if ($user === null || !$user->verifyPassword($password)) {
        // TODO Fehlermeldung
        $template_data['message'] = 'login fehlgeschlagen';
    } else {
        header('Location: game.php');
        exit();
    }
}


echo $template->render($template_data);
