<?php


class Session
{
    public static function init()
    {
        session_start();
    }

    public static function set($name, $value)
    {
        $_SESSION[$name] = $value;
    }

    public static function abort()
    {
        self::init();
        session_destroy();
    }
}