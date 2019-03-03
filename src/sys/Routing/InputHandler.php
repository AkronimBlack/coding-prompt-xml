<?php

namespace src\sys\Routing;

use src\sys\Entity\Request;

class InputHandler
{
    public function constructRequestFromGlobals()
    {
        return new Request();
    }
}
