<?php

namespace src\sys\Services;


class SessionHandler
{
    public static function createSession($user): void
    {
        session_start();
        $_SESSION['user_id'] = $user['id'];
    }

    /**
     * @return mixed
     */
    public static function getSession()
    {
        session_start();
        return $_SESSION;
    }
}
