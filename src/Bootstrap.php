<?php

namespace src;

use src\sys\Router;
use src\sys\Routing\InputHandler;

class Bootstrap
{
    /**
     * Bootstrap constructor.
     */
    public function __construct()
    {
        $router = new Router(new InputHandler());
        $router->route();
    }

}
