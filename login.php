<?php
session_start();
require_once ("global.php");




if (isset($_POST['email']) && empty($_POST['email'] == false)) {
    
    $email = addslashes($_POST['email']);
    
    $senha = addslashes($_POST['senha']);
    
    //$conexao = Conexao::pegarConexao();
    
    $usuarioDao = new usuarioDao();
    
    $usuario = $usuarioDao->validaUsuario($email, $senha);
    
    
    if($usuario == null) {
        //echo "usuario NULL";
        Sessao::setSessao("danger", "Usuário ou senha inválido.");
        //print_r(Sessao::getSessao("danger"));
        header("Location: index.php");
    } else {
        //echo "<br/> validou usuarios";
        
        Sessao::setSessao("sucess", "Usuário logado com sucesso.");
        Sessao::setSessao("usuario_logado", $usuario->getEmail());
        header("Location: index.php");
    }
    die();
    
}

