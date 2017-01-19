<?php

require '../bootstrap.php';

if (!$_SESSION['loggedIn']) {
    header('Location: login.php');
}

$template = $twig->load('sucess.html');

echo $template->render(array(
    'title' => 'Erfolgreich angemeldet!!!',
));

