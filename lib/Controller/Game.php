<?php

namespace Minesweeper\Controller;

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;

class Game extends AbstractController
{
    public function getIndex($request, $response, $args)
    {
        $this->container->view->render($response, 'success.twig', [
            'title' => 'Erfolgreich angemeldet!!!',
        ]);

        return $response;
    }
}
