<?php

require '../bootstrap.php';

$template = $twig->load('sucess.html');

echo $template->render(array(
    'title' => 'Erfolgreich angemeldet!!!',
));

