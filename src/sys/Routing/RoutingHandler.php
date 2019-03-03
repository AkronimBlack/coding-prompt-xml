<?php

namespace src\sys\Routing;


use src\sys\Entity\Request;

class RoutingHandler
{
    /**
     * @param Request $request
     * @param array $routs
     */
    public function execute(Request $request, array $routs)
    {
        var_dump($this->resolveRoute($request, $routs));
    }

    /**
     * @param Request $request
     * @param array $routes
     *
     * @return array
     */
    private function resolveRoute(Request $request, array $routes): array
    {
        foreach ($routes as $route => $call)
        {
            if($request->getUri() === $route)
            {
                list($controller , $method) = explode('/', $call);
                return array(
                    'controller' => $controller,
                    'method' => $method
                );
            }
        }
        return array(
            'controller' => 'IndexController',
            'method' => 'index'
        );
    }
}
