<?php

require '../bootstrap.php';

$template = $twig->load('game.tpl.html');

echo $template->render(array(
    'title' => 'Spiel',
));

