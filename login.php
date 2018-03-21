<?php
session_start();
require_once ("global.php");




if (isset($_POST['email']) && empty($_POST['email'] == false)) {
    
    $emailUsuario = addslashes($_POST['email']);
    
    $senhaUsuario = addslashes($_POST['senha']);
    
    //$conexao = Conexao::pegarConexao();
    
    $usuarioDao = new usuarioDao();
    
    
    
    if($usuarioDao->validaUsuario($emailUsuario, $senhaUsuario)) {
        //echo "<br/> validou usuarios";
        Sessao::setSessao("sucess", "Usuário logado com sucesso.");
        Sessao::setSessao("usuario_logado", $emailUsuario);
        header("Location: index.php");
        
    } else {
        //echo "usuario NULL";
        Sessao::setSessao("danger", "Usuário ou senha inválido.");
        //print_r(Sessao::getSessao("danger"));
        header("Location: index.php");
    }
    die();
    
}

