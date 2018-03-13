<?php
session_start();
require_once ("class/Usuario.php");
require_once ("class/usuarioDao.php");
require_once ("db/Connection.php");
require_once ("class/Session.php");




if (isset($_POST['email']) && empty($_POST['email'] == false)) {
    
    $email = addslashes($_POST['email']);
    
    $senha = addslashes($_POST['senha']);
    
    $conexao = Connection::getConnection();
    
    $usuarioDao = new usuarioDao($conexao);
    
    $usuario = $usuarioDao->verificaUsuario($email, $senha);
    
    
    if($usuario == null) {
        echo "usuario NULL";
        Session::setSessao("danger", "Usuário ou senha inválido.");
        print_r(Session::getSessao("danger"));
        //header("Location: index.php");
    } else {
        echo "<br/> validou usuarios";
        
        Session::setSessao("sucess", "Usuário logado com sucesso.");
        echo "<br/>";
        print_r(Session::getSessao("sucess"));
        Session::setSessao("usuario_logado", $usuario->getEmail());
        echo "<br/>";
        print_r(Session::getSessao("usuario_logado"));
        echo "<br/> Voltei pra function";
        header("Location: index.php");
    }
}
die();

