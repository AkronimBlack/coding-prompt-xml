<?php

namespace src\sys\Routing;

use src\sys\Entity\Request;

class InputHandler
{
    public function constructRequestFromGlobals(): Request
    {
        return new Request(
            $_SERVER['REQUEST_URI'],
            $_SERVER['REQUEST_METHOD'],
            $_SERVER['QUERY_STRING']
        );
    }
}
