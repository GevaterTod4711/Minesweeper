<?php
// Routes

$routes = [
    '/' => [
        'GET' => '\Minesweeper\Controller\Base:getIndex',
    ],
    '/game' => [
        'GET' => '\Minesweeper\Controller\Game:getIndex',
    ],
    '/login' => [
        'GET' => '\Minesweeper\Controller\Auth:getLogin',
        'POST' => '\Minesweeper\Controller\Auth:postLogin',
    ],
    '/register' => [
        'GET' => '\Minesweeper\Controller\Auth:getRegister',
        'POST' => '\Minesweeper\Controller\Auth:postRegister',
    ],
];

// Add routes to app
foreach ($routes as $pattern => $target)
{
    foreach ($target as $method => $callable)
    {
        $app->map([$method], $pattern, $callable);
    }
}
