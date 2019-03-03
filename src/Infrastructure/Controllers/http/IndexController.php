<?php

namespace src\Infrastructure\Controllers\http;

use src\sys\Entity\DatabaseConnect;
use src\sys\Entity\Response;
use src\sys\Services\LoadBaseDataSetService;
use src\sys\Services\LoadDatabaseService;

class IndexController
{
    public function index(): Response
    {
        return new Response(
            'index',
            ['index']
        );
    }

    /**
     * @return Response
     */
    public function loadDatabase(): Response
    {
        $results = array();
        $conn = new DatabaseConnect();
        $loadDatabaseService = new LoadDatabaseService($conn);
        $loadBaseDataService = new LoadBaseDataSetService($conn);
        $results[] = $loadDatabaseService->execute();
        $results[] = $loadBaseDataService->execute();
        return new Response(
            'index',
            $results
        );
    }
}
