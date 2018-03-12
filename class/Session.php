<?php

class Session
{

    private static $_sessionStarted = false;

    public static function iniciaSessao()    {
        if ($self::$_sessionStarted == false) {
            session_start();
            self::$_sessionStarted = true;
        }
    }

    // $_SESSION[$key] = $value;
    public static function setSessao($email)    {
        $_SESSION["usuario_logado"] = $email;
    }

    public static function getSessao($key)    {
        if (isset($_SESSION[$key])) {
            return $_SESSION[$key];
        } else {
            return false;
        }
    }

    public static function mostraSessao()    {
        echo "<pre>";
        print_r($_SESSION);
        echo "</pre>";
    }
    
    public static function logout() {
        session_unset();
        session_destroy();
        header("Location: index.php");
    }
    
    public function usuarioEstaLogado() {
        return isset($_SESSION["usuario_logado"]);
    }
    
    public function verificaUsuario() {
        if(!usuarioEstaLogado()) {
            $_SESSION["danger"] = "Você não tem acesso a esta funcionalidade.";
            header("Location: index.php");
            die();
        }
    }
    
    public static function usuarioLogado() {
        return $_SESSION["usuario_logado"];
    }
    
        

}