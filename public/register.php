<?php

require '../bootstrap.php';

$name = filter_input(INPUT_POST,'name',FILTER_SANITIZE_SPECIAL_CHARS);
$passwort = filter_input(INPUT_POST, 'password', FILTER_UNSAFE_RAW);

//$hash = crypt($passwort);
if ($_POST['name']) {
$dbh = Database::getInstance();
$hash = $dbh->getPasswordHash($passwort);
$return = $dbh->registerUser($name,$hash);
}
$template = $twig->load('register.tpl.html');

echo $template->render(array(
    'title' => 'Register',
));
