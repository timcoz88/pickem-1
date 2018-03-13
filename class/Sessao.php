<?php

class Sessao
{

    private static $_sessionStarted = false;

    public static function iniciaSessao()    {
        if ($self::$_sessionStarted == false) {
            session_start();
            self::$_sessionStarted = true;
        }
    }

    // $_SESSION[$key] = $value;
    public static function setSessao($tipo, $valor)    {
        $_SESSION[$tipo] = $valor;
    }

    public static function getSessao($tipo)    {
        if (isset($_SESSION[$tipo])) {
            return $_SESSION[$tipo];
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
    }
    
    public function usuarioEstaLogado() {
        return isset($_SESSION["usuario_logado"]);
    }
    
    public function verificaUsuario() {
        if(!usuarioEstaLogado()) {
            self::setSessao("danger", "Você não tem acesso a esta funcionalidade.");
            header("Location: index.php");
            die();
        }
    }
    
    public static function usuarioLogado() {
        return self::getSessao("usuario_logado");
    }
    
    public static function mostraAlerta($tipo) {
        if(isset($_SESSION[$tipo])) {
            Echo "<p class='alert alert-".$tipo." role='alert'>".$_SESSION[$tipo]."</p>";
		unset($_SESSION[$tipo]);
	}
}
        

}