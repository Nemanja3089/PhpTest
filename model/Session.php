<?php

class Session
{
    #This class have methods to start, get, set and destroy session

    public static function start()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
    }

    public static function get($key)
    {
        self::start();
        if (isset($_SESSION[$key])) {
            return $_SESSION[$key];
        } else {
            return false;
        }
    }

    public static function set($key, $value = '')
    {
        self::start();
        $_SESSION[$key] = $value;
    }

    public static function stop()
    {
        self::start();
        foreach ($_SESSION as $k => $v) {
            unset($_SESSION[$k]);
        }
        session_destroy();
    }
}
