<?php

require '../bootstrap.php';

$name = filter_input(INPUT_POST,'user',FILTER_SANITIZE_SPECIAL_CHARS);
$passwort = filter_input(INPUT_POST, 'pw', FILTER_UNSAFE_RAW);

//$hash = crypt($passwort);
$dbh = Database::getInstance();
$hash = $dbh->getPasswordHash($password);
$return = $dbh->registerUser($name,$hash);

$template = $twig->load('register.tpl.html');

echo $template->render(array(
    'title' => 'Register',
));
