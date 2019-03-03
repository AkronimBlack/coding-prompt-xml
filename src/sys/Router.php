<?php

namespace src\sys;

use src\sys\Routing\InputHandler;
use src\sys\Routing\RoutingHandler;

class Router
{
    /**
     * @var InputHandler
     */
    private $inputHandler;
    /**
     * @var RoutingHandler
     */
    private $routingHandler;

    /**
     * Router constructor.
     *
     * @param InputHandler $inputHandler
     * @param RoutingHandler $routingHandler
     */
    public function __construct(InputHandler $inputHandler, RoutingHandler $routingHandler)
    {
        $this->inputHandler = $inputHandler;
        $this->routingHandler = $routingHandler;
    }
    public function route()
    {
        $request = $this->inputHandler->constructRequestFromGlobals();
        $this->routingHandler->execute($request);
    }
}
