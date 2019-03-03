<?php

namespace src\Infrastructure\Controllers\http;

use src\sys\Entity\DatabaseConnect;
use src\sys\Entity\Request;
use src\sys\Entity\Response;

class IndexController
{
    public function index(Request $request): Response
    {
        return new Response(
            'index'
        );
    }

    /**
     * @return Response
     */
    public function loadDatabase(): Response
    {
        $conn = new DatabaseConnect();
        var_dump($conn);
        return new Response(
            'index'
        );
    }
}
