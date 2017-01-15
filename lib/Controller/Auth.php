<?php

namespace Minesweeper\Controller;

use Minesweeper\Database;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;

class Auth extends AbstractController
{
    public function getLogin($request, $response, $args)
    {
        if (isset($_SESSION['user'])) {
            header("Location: main.php");
        }

        $this->container->view->render($response, 'login.tpl.html', [
            'title' => 'Login',
        ]);

        return $response;
    }

    public function postLogin($request, $response, $args)
    {
        if (isset($_SESSION['user'])) {
            header("Location: main.php");
        }

        $template_data = array(
            'title' => 'Login',
        );

        if (!empty($_POST['name']) && !empty($_POST['password'])) {

            $db = Database::getInstance();
            $user = filter_input(INPUT_POST, 'user');
            $passwd = filter_input(INPUT_POST, 'password');

            $hash = $db->getPasswordHashForUser($user);

            if (password_verify($passwd, $hash)) {
                echo 'yes';
                $template_data['result'] = 'Login erfolgreich.';

                header('Location: userdata.php');
            } else {
                echo 'no';
                $template_data['result'] = 'Login fehlgeschlagen';
            }
        }

        $this->container->view->render($response, 'login.tpl.html', $template_data);

        return $response;
    }

    public function getRegister($request, $response, $args)
    {
        $this->container->view->render($response, 'register.tpl.html', [
            'title' => 'Register',
        ]);

        return $response;
    }

    public function postRegister($request, $response, $args)
    {
        $template_data = array(
            'title' => 'Register',
        );

        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
        $passwort = filter_input(INPUT_POST, 'password', FILTER_UNSAFE_RAW);
        $confirm = filter_input(INPUT_POST, 'confirm', FILTER_UNSAFE_RAW);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);

        if ($name && $passwort && $email && $passwort === $confirm) {
            $dbh = Database::getInstance();

            $hash = $dbh->getPasswordHash($passwort);

            $return = $dbh->registerUser($name, $hash, $email);
        } else {
            echo 'Fehler!!!!!';
        }

        $this->container->view->render($response, 'register.tpl.html', $template_data);

        return $response;
    }
}
