<?php

namespace src\sys\Entity;


class Response
{
    /**
     * @var string
     */
    private $file;
    /**
     * @var array
     */
    private $data;

    public function __construct(
        string $file,
        array $data = null
    )
    {

        $this->file = $file;
        $this->data = $data;
    }

    /**
     * @return string
     */
    public function getFile(): string
    {
        return $this->file;
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }

}
