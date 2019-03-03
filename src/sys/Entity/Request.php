<?php

namespace src\sys\Entity;


class Request
{

    private $uri;
    private $url;
    private $query;
    private $method;
    private $queryArray;
    private $files;

    public function __construct(
        $uri,
        $method,
        $query,
        $files
    ) {
        $this->uri    = $uri;
        $this->url = $this->constructUrl($uri);
        $this->query  = urldecode($query);
        $this->method = $method;
        $this->files = $files;

        $this->resolveQuery();
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

    private function resolveQuery(): void
    {
        if($this->getQuery()){
            $query         = array();
            $explodedQuery = explode('&', $this->getQuery());
            foreach ($explodedQuery as $queryValue) {
                list($key, $value) = explode('=', $queryValue);
                $query[$key] = $value;
            }
            $this->queryArray = $query;
        }
    }

    /**
     * @param string $key
     *
     * @return string|null
     */
    public function findInQuery(string $key): ?string
    {
        if (array_key_exists($key , $this->queryArray)){
            return $this->queryArray[$key];
        }
        return null;
    }

    /**
     * @param string $name
     */
    public function getUpload(string $name)
    {
        if(array_key_exists($name , $this->files))
        {
            return $this->files[$name];
        }
        return false;
    }

}
