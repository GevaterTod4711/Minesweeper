<?php

namespace Minesweeper\Controller;

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;

class Base extends AbstractController
{
    public function getIndex($request, $response, $args)
    {
        $this->container->view->render($response, 'start_screen.twig', [
            'title' => 'Main',
        ]);

        return $response;
    }
}
