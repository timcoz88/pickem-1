<?php 
require_once ("class/Usuario.php");
require_once ("class/usuarioDao.php");
require_once ("db/Connection.php");
require_once ("db/banco-usuario.php");



if (isset($_POST['email']) && empty($_POST['email'] == false)) {
    
    $email = addslashes($_POST['email']);
    
    $senha = addslashes($_POST['senha']);
    
    $conexao = Connection::getConnection();
    
    $usuarioDao = new usuarioDao($conexao);
    
    $usuario = $usuarioDao->verificaUsuario($email, $senha);
    
    
    if($usuario == null) {
        $_SESSION["danger"] = "Usuário ou senha inválido.";
        header("Location: index.php");
    } else {
        print_r($usuario);
        $_SESSION["success"] = "Usuário logado com sucesso.";
        Session::setSessao($usuario->getEmail());
        header("Location: index.php");
    }
    die();
}

