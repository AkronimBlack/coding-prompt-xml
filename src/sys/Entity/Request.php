<?php

namespace src\sys\Entity;


class Request
{

    private $uri;
    private $url;
    private $query;
    private $method;

    public function __construct(
        $uri,
        $method,
        $query
    ) {
        $this->uri    = $uri;
        $this->url = $this->constructUrl($uri);
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

    /**
     * @param $uri
     *
     * @return mixed
     */
    private function constructUrl($uri)
    {
        if (strpos($uri, '?')){
            list($url, $query) = explode('?', $uri);
        }else{
            $url = $uri;
        }
        return $url;
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

}
