<?php

namespace src\sys\Routing;


use src\sys\Entity\Request;

class RoutingHandler
{
    /**
     * @param Request $request
     */
    public function execute(Request $request, array $routs)
    {
        var_dump($routs);
    }
}
