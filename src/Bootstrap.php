<?php

namespace src;

use src\sys\Router;
use src\sys\Routing\InputHandler;
use src\sys\Routing\RoutingHandler;

class Bootstrap
{
    /**
     * Bootstrap constructor.
     */
    public function __construct()
    {
        $router = new Router(
            new InputHandler(),
            new RoutingHandler()
        );
        $router->route();
    }

}
