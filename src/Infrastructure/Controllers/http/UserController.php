<?php

namespace src\Infrastructure\Controllers\http;

use src\Domain\Services\AuthenticationService;
use src\Infrastructure\Persistence\UserRepository;
use src\sys\Entity\Request;
use src\sys\Entity\Response;

class UserController
{
    public function login(Request $request): Response
    {
        $service = new AuthenticationService(new UserRepository());
        $result = $service->execute(
            $request->findInQuery('authentication')
        );
        return new Response(
            'index',
            array(
                'response' => $result
            )
        );
    }

}
