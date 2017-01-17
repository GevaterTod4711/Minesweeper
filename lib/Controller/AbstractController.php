<?php

namespace Minesweeper\Controller;

use Interop\Container\ContainerInterface;

abstract class AbstractController
{
    /**
    * Interop\Container\ContainerInterface $container
    */
    protected $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }
}
