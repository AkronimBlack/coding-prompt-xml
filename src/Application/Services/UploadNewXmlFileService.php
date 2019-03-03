<?php

namespace src\Application\Services;


use src\Infrastructure\Persistence\ProductRepository;
use src\sys\Savers\Archiver;

class UploadNewXmlFileService
{
    /**
     * @var Archiver
     */
    private $achiver;
    /**
     * @var ProductRepository
     */
    private $productRepository;

    public function __construct(
        Archiver $achiver,
        ProductRepository $productRepository
    )
    {
        $this->achiver = $achiver;
        $this->productRepository = $productRepository;
    }

    /**
     * @param UploadNewXmlFileRequest $request
     *
     * @return mixed
     */
    public function execute($request)
    {
        $file = $request->getXml();
        $decodedXml = simplexml_load_string(file_get_contents($file['tmp_name']));
        $this->achiver->save($file);

        $items = array();

        foreach ($decodedXml->new_products as $product){
            foreach ($product as $details){
                $this->productRepository->addProduct($details->code, $details->name, $details->description, $details->price);
                $items[] = $details->name;
            }
        }

        return array(
            'success' => true,
            'items' =>json_encode($items)
        );
    }
}
