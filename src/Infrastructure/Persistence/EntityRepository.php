<?php

namespace src\Infrastructure\Persistence;


use src\sys\Entity\DatabaseConnect;

class EntityRepository
{
    public function getDatabaseObject(): DatabaseConnect
    {
        return new DatabaseConnect();
    }
}
