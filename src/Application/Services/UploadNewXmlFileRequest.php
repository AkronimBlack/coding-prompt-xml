<?php

namespace src\Application\Services;


class UploadNewXmlFileRequest
{
    private $xml;

    public function __construct(
        $xml
    )
    {
        $this->xml = $xml;
    }

    /**
     * @return mixed
     */
    public function getXml()
    {
        return $this->xml;
    }
}
