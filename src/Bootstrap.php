<?php

namespace src;

use config\Routes;
use src\sys\Renderer\Renderer;
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
            new RoutingHandler(),
            new Renderer(),
            Routes::getRouts()
        );
        $router->route();
    }

}
