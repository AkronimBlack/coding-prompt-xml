<?php

namespace src\sys\Services;


use src\sys\Entity\DatabaseConnect;

class LoadDatabaseService
{
    /**
     * @var DatabaseConnect
     */
    private $databaseConnect;

    public function __construct(
        DatabaseConnect $databaseConnect
    )
    {
        $this->databaseConnect = $databaseConnect;
    }

    public function execute(): string
    {
        $this->createApiKeysTable();
        $this->createProductsTable();
        return 'Tables loaded successfully';
    }

    private function createApiKeysTable(): void
    {
        $sql = "DROP TABLE IF EXISTS `api_keys`;
                CREATE TABLE `api_keys` (
                `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
                `key` varchar(32) NOT NULL DEFAULT '',
                `vendor_id` int(11) NOT NULL,
                PRIMARY KEY (`id`)
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
        $this->databaseConnect->executeSql($sql);
    }
    private function createProductsTable(): void
    {
        $sql = "DROP TABLE IF EXISTS `products`;
                CREATE TABLE `products` (
                `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
                `code` varchar(255) NOT NULL DEFAULT '',
                `name` varchar(255) NOT NULL DEFAULT '',
                `description` text,
                `price` double(20,2) NOT NULL,
                PRIMARY KEY (`id`)
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
        $this->databaseConnect->executeSql($sql);
    }
}
