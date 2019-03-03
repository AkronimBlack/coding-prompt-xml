<?php

namespace config;


class Routes
{
    private static $ROUTS = array(
        '/index' => 'IndexController/index',
    );

    public static function getRouts(): array
    {
        return self::$ROUTS;
    }
}
