<?php

namespace src\sys\Renderer;


use src\sys\Entity\Response;

class Renderer
{
    public function execute(Response $response)
    {
        if (file_exists('/application/Views/' . $response->getFile(). '.php')){
            $data = $response->getData();
            include_once '/application/Views/' . $response->getFile(). '.php';
        }
        else{
            echo 'file not found';
            die();
        }
    }
}
