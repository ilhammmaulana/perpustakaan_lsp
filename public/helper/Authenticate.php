<?php

class Authenticate
{
    public static function regenerateSession($user)
    {
        session_start();
        $_SESSION['user'] = $user;
    }
    public static function user()
    {
        session_start();
        return $_SESSION['user'];
    }
    public static function check()
    {
        session_start();
        if (isset($_SESSION['user'])) {
            return true;
        }
        return false;
    }
    public static function logout()
    {
        session_start();
        session_destroy();
    }
}