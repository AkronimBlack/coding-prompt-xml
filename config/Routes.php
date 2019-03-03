<?php

namespace config;


class Routes
{
    private static $ROUTS = array(
        '/index' => 'IndexController/index',
        '/load/database' => 'IndexController/loadDatabase',
    );

    public static function getRouts(): array
    {
        return self::$ROUTS;
    }
}
