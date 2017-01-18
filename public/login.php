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
    $user = filter_input(INPUT_POST, 'name');
    $passwd = filter_input(INPUT_POST, 'password');
    echo 'user ' . $user;
    echo ' passwd ' . $passwd;
    $hash = $db->getPasswordHashForUser($user);

    if (password_verify($passwd, $hash)) {
        echo 'yes';
        $template_data['result'] = 'Login erfolgreich.';

        header('Location: game.php');
    } else {
        echo 'no';
        $template_data['result'] = 'Login fehlgeschlagen';
    }
}


echo $template->render($template_data);
