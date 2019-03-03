<?php

namespace src\sys\Entity;


class Request
{

    private $uri;
    private $query;
    private $method;

    public function __construct(
        $uri,
        $method,
        $query
    ) {
        $this->uri    = $uri;
        $this->query  = urldecode($query);
        $this->method = $method;
    }

    /**
     * @return mixed
     */
    public function getUri()
    {
        return $this->uri;
    }

    /**
     * @return mixed
     */
    public function getQuery()
    {
        return $this->query;
    }

    /**
     * @return mixed
     */
    public function getMethod()
    {
        return $this->method;
    }


}
