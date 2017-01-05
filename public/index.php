<?php

require '../bootstrap.php';

$template = $twig->load('login.tpl.html');

echo $template->render(array(
    'title' => 'Test',
));
