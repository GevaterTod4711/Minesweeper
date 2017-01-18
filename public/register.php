<?php

require '../bootstrap.php';

$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
$passwort = filter_input(INPUT_POST, 'password', FILTER_UNSAFE_RAW);
$confirm = filter_input(INPUT_POST, 'confirm', FILTER_UNSAFE_RAW);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);

if ($name && $passwort && $email && $passwort === $confirm) {
    $dbh = Minesweeper\Database::getInstance();

    $hash = $dbh->getPasswordHash($passwort);

    $return = $dbh->registerUser($name, $hash, $email);
} else {
    echo 'Fehler!!!!!';
}
$template = $twig->load('register.tpl.html');

echo $template->render(array(
    'title' => 'Register',
));
