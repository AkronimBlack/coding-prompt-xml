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

    public function test()
    {
        return json_encode(
            array (
                'code' => 'some code here',
                'customer' => 'come company name here',
                'contact_name' => 'person name ',
                'products' =>
                    array (
                        0 =>
                            array (
                                'name' => 'product 1',
                                'price' => 12.1099999999999994315658113919198513031005859375,
                                'discount_percentage' => 0,
                            ),
                        1 =>
                            array (
                                'name' => 'product 2',
                                'price' => 302.33999999999997498889570124447345733642578125,
                                'discount_percentage' => 50,
                            ),
                        2 =>
                            array (
                                'name' => 'product 3',
                                'price' => 456.1000000000000227373675443232059478759765625,
                                'discount_percentage' => 20,
                            ),
                    ),
                'total' => 528.1599999999999681676854379475116729736328125,
                'sentTimestamp' => '1451814312',
            )
        );
    }
}
