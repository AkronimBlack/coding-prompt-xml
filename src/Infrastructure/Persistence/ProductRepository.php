<?php

namespace src\Infrastructure\Persistence;


class ProductRepository extends EntityRepository
{
    public function addProduct($code, $name, $description, $price): void
    {
        try{
            $sql = "INSERT INTO xml.products (code, name, description,price) VALUES (?,?,?,?)";
            $stmt= $this->getDatabaseObject()->getConnection()->prepare($sql);
            $stmt->execute([$code, $name, $description, $price]);
        }catch (\PDOException $e){
            echo 'Error: ' . $e->getMessage();
            die();
        }
    }
}
