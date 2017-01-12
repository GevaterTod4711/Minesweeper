<?php

require '../bootstrap.php';

$template = $twig->load('start_screen.tpl.html');

echo $template->render(array(
    'title' => 'Main',
));
