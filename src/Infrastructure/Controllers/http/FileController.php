<?php

namespace src\Infrastructure\Controllers\http;


use src\Application\Services\UploadNewXmlFileRequest;
use src\Application\Services\UploadNewXmlFileService;
use src\Infrastructure\Persistence\ProductRepository;
use src\sys\Entity\Request;
use src\sys\Savers\Archiver;

class FileController
{
    /**
     * @param Request $request
     *
     * @return false|string
     */
    public function upload(Request $request)
    {
        $service = new UploadNewXmlFileService(
            new Archiver(),
            new ProductRepository()
        );
        $result  = $service->execute(
            new UploadNewXmlFileRequest(
                $request->getUpload('xml')
            )
        );

        return json_encode($result);
    }


}
