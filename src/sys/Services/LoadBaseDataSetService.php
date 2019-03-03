<?php

namespace src\sys\Services;


use src\sys\Entity\DatabaseConnect;

class LoadBaseDataSetService
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
        $this->insertApiKey();
        return 'Start data loaded successfully';
    }

    private function insertApiKey(): void
    {
        $sql = "INSERT INTO `api_keys` (`id`, `key`, `vendor_id`)
                VALUES
                (1,'H50y33eUcs3NeqZ4hNwraHKllfisW55d',764);";
        $this->databaseConnect->executeSql($sql);
    }
}
