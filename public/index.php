<?php

require '../bootstrap.php';

$template = $twig->load('register.tpl.html');

echo $template->render(array(
    'title' => 'Login',
));
