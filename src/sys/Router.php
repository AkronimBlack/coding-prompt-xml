<?php

namespace src\sys;

use src\sys\Routing\InputHandler;

class Router
{
    /**
     * @var InputHandler
     */
    private $inputHandler;

    public function __construct(InputHandler $inputHandler)
    {
        $this->inputHandler = $inputHandler;
    }
    public function route()
    {
        $this->inputHandler->constructRequestFromGlobals();
    }
}
