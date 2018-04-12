<?php
session_start();
require_once ("global.php");

if (isset($_POST['email']) && empty($_POST['email'] == false)) {
    
    $emailUsuario = addslashes($_POST['email']);
    
    $senhaUsuario = addslashes($_POST['senha']);
}


function logaUsuario($emailUsuario, $senhaUsuario) {


    
    $usuarioDao = new usuarioDao();
    
    $usuario_id = $usuarioDao->validaUsuario($emailUsuario, $senhaUsuario);

    if($usuario_id) {
        
        $usuario = new Usuario();
        
        $usuario = $usuarioDao->buscaUsuario($usuario_id);
        
        Sessao::setSessao("sucess", "Usuário logado com sucesso.");
        Sessao::setSessao("usuario_id", $usuario->getIdUsuario());
        Sessao::setSessao("usuario_email", $usuario->getEmailUsuario());
        Sessao::setSessao("usuario_tipo", $usuario->getTipoUsuario());
        
        header("Location: index.php");
        
    } else {
        //echo "usuario NULL";
        Sessao::setSessao("danger", "Usuário ou senha inválido.");
        //print_r(Sessao::getSessao("danger"));
        header("Location: index.php");
    }
    die();
    
}
