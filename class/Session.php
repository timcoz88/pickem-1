<?php

class Session
{

    private static $_sessionStarted = false;

    public static function start()    {
        if ($self::$_sessionStarted == false) {
            session_start();
            self::$_sessionStarted = true;
        }
    }

    // $_SESSION[$key] = $value;
    public static function set($key, $value)    {
        $_SESSION[$key] = $value;
    }

    public static function get($key)    {
        if (isset($_SESSION[$key])) {
            return $_SESSION[$key];
        } else {
            return false;
        }
    }

    public static function display()    {
        echo "<pre>";
        print_r($_SESSION);
        echo "</pre>";
    }
    
    public static function logout() {
        session_unset();
        session_destroy();
        header("Location: index.php");
    }
}