<?php

namespace config;


class Database
{
        private static $DATABASE_INFO = array(
            'host' => 'mysql',
            'username' => 'root',
            'password' => 'root',
            'database' => 'xml',
            'port' => 8002
        );
        public static function getDatabaseInfo(): array
        {
            return self::$DATABASE_INFO;
        }
}
