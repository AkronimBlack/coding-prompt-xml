<?php

namespace config;


class Routes
{
    private static $ROUTS = array(
        '/index' => 'IndexController/index',
        '/load/database' => 'IndexController/loadDatabase',
        '/login' => 'UserController/login',
        '/file/upload' => 'FileController/upload',
        '/test' => 'IndexController/test'
    );

    /**
     * @return array
     */
    public static function getRouts(): array
    {
        return self::$ROUTS;
    }
}
