<?php
require_once ("global.php");

try {
    $nomeUsuario = $_POST['nome'];
    $sobrenomeUsuario = $_POST['sobrenome'];
    $emailUsuario = $_POST['email'];
    $senhaUsuario = $_POST['senha'];
    $tipoUsuario = 1;
    $usuarioAtivo = 0;
    
    $usuario = new Usuario();
    
    $usuario->setNomeUsuario($nomeUsuario);
    $usuario->setSobrenomeUsuario($sobrenomeUsuario);
    $usuario->setEmailUsuario($emailUsuario);
    $usuario->setSenhaUsuario($senhaUsuario);
    $usuario->setTipoUsuario($tipoUsuario);
    $usuario->setUsuarioAtivo($usuarioAtivo);
    
    
    //$conexao = Conexao::pegarConexao();
    $usuarioDao = new usuarioDao();
    
    
    if($usuarioDao->inserir($usuario)) {
        Sessao::setSessao("success", "Cadastro realizado com sucesso");
    }

    //header para a página de confirmação de email
    header("Location: user-register-success.php");
} catch (Exception $e) {
    Erro::trataErro($e);
}

