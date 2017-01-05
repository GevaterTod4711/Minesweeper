<?php

require 'bootstrap.php';
//require '/lib/Template.class.php';

//$template = new Template();
//$template->assign("{title}", 'Login');
//$template->display('/templates/login.tpl.html');

$template = $twig->load('login.tpl.html');

echo $template->render(array(
    'title' => 'Test',
));
