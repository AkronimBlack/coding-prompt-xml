<?php

namespace src\Infrastructure\Persistence;


class UserRepository extends EntityRepository
{

    /**
     * sneaky... very sneaky... took me a bit to figure out why it fails
     * but that is on me :D
     * Naming column "key" ccc i like it :)
     *
     *
     * @param string $key
     *
     * @return mixed
     */
    public function findUserByKey(string $key)
    {
        $pdo = $this->getDatabaseObject()->getConnection();
        try{
            $stmt = $pdo->prepare("SELECT * FROM xml.api_keys where `key`=:key");
            $stmt->execute(['key' => $key]);
            return $stmt->fetch();
        }catch (\PDOException $e){
            echo 'Error: ' . $e->getMessage();
            die();
        }
    }
    public function findUserById(string $id)
    {
        $pdo = $this->getDatabaseObject()->getConnection();
        try{
            $stmt = $pdo->prepare("SELECT * FROM xml.api_keys where id=:id");
            $stmt->execute(['id' => $id]);
            return $stmt->fetch();
        }catch (\PDOException $e){
            echo 'Error: ' . $e->getMessage();
            die();
        }
    }

}
