<?php

require '../bootstrap.php';

$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
$password = filter_input(INPUT_POST, 'password', FILTER_UNSAFE_RAW);
$confirm = filter_input(INPUT_POST, 'confirm', FILTER_UNSAFE_RAW);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);

if ($name && $password && $email && $password === $confirm) {
    $dbh = Minesweeper\Database::getInstance();
    
    $user = new Minesweeper\User;
    $user->setName($name);
    $user->setPassword($password);
    $user->setEmail($email);

    $return = $dbh->registerUser($user);

    if ($return) {
        header('Location: login.php');
    }
} else {
    //echo 'Fehler!!!!!';
}
$template = $twig->load('register.tpl.html');

echo $template->render(array(
    'title' => 'Register',
));
