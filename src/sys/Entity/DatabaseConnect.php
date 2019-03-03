<?php

namespace src\sys\Entity;


use config\Database;

class DatabaseConnect
{
    private $host;
    private $database;
    private $username;
    private $password;

    private $connection;

    /**
     * DatabaseConnect constructor.
     */
    public function __construct()
    {
        $credentials = Database::getDatabaseInfo();
        $this->host = $credentials['host'];
        $this->database = $credentials['database'];
        $this->username = $credentials['username'];
        $this->password = $credentials['password'];
    }

    /**
     * @return \PDO
     */
    public function getConnection(): \PDO
    {
        if(!$this->connection){
            try {
                $conn = new \PDO("mysql:host=$this->host;dbname=$this->database", $this->username, $this->password);
                $conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            }
            catch(\PDOException $e)
            {
                echo 'Connection failed: ' . $e->getMessage();
                die();
            }
            $this->connection = $conn;
        }
        return $this->connection;
    }

    /**
     * @param $sql
     */
    public function executeSql($sql): void
    {
        try{
            $this->getConnection()->exec($sql);
        }catch (\PDOException $e){
            echo $sql . "<br>" . $e->getMessage();
            die();
        }
        $this->connection = null;
    }
}
