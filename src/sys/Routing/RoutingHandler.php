<?php

namespace src\sys\Routing;


use src\sys\Entity\Request;

class RoutingHandler
{
    /**
     * @param Request $request
     * @param array $routs
     *
     * @return mixed
     */
    public function execute(Request $request, array $routs)
    {
        $callable = $this->resolveRoute($request, $routs);
        return $this->callControllerAndMethod($callable['controller'] , $callable['method'] , $request);
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
            if($request->getUrl() === $route)
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

    /**
     * @param string $controller
     * @param string $method
     * @param Request $request
     *
     * @return mixed
     */
    private function callControllerAndMethod(string $controller, string $method, Request $request)
    {

        $class = 'src\\Infrastructure\\Controllers\\http\\' . $controller;
        if(!class_exists($class)){
            echo 'Failed calling controller or method';
            die();
        }

        try {
            $classDetails = new \ReflectionMethod($class, $method);
        } catch (\ReflectionException $e) {
            var_dump($e);
        }
        $params = $classDetails->getParameters();
        foreach ($params as $param)
        {
            if($param->getType() == 'src\sys\Entity\Request')
            {
                return call_user_func_array(array($class, $method), array($request));
            }
        }
        return call_user_func(array($class, $method));
    }
}
