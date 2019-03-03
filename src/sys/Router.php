<?php

namespace src\sys;

use config\Routes;
use src\sys\Renderer\Renderer;
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
     * @var Renderer
     */
    private $renderer;
    /**
     * @var array
     */
    private $routs;

    /**
     * Router constructor.
     *
     * @param InputHandler $inputHandler
     * @param RoutingHandler $routingHandler
     * @param Renderer $renderer
     * @param array $routs
     */
    public function __construct(
        InputHandler $inputHandler,
        RoutingHandler $routingHandler,
        Renderer $renderer,
        array $routs
    ) {
        $this->inputHandler   = $inputHandler;
        $this->routingHandler = $routingHandler;
        $this->renderer       = $renderer;
        $this->routs = $routs;
    }

    public function route(): void
    {
        $request  = $this->inputHandler->constructRequestFromGlobals();
        $response = $this->routingHandler->execute(
            $request,
            $this->routs
        );
        $this->renderer->execute($response);
    }
}
