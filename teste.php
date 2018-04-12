<?php
session_start();
require_once ("global.php");

try {
    $nomeUsuario = "TESTE";
    $sobrenomeUsuario = "SOBRENOME";
    $emailUsuario = "sohenva@hmail.com";
    $senhaUsuario = "senha";
    $tipoUsuario = 1;
    $usuarioAtivo = 0;
    
    date_default_timezone_set('America/Sao_Paulo');
    $dataCadastro = date('Y-m-d H:i:s');
    
    $usuario = new Usuario();
    
    $usuario->setNomeUsuario($nomeUsuario);
    $usuario->setSobrenomeUsuario($sobrenomeUsuario);
    $usuario->setEmailUsuario($emailUsuario);
    $usuario->setSenhaUsuario($senhaUsuario);
    $usuario->setTipoUsuario($tipoUsuario);
    $usuario->setUsuarioAtivo($usuarioAtivo);
    $usuario->setDataCadastro($dataCadastro);
    
    echo "<pre>";
    print_r($usuario);
    echo "</pre>";
    
    //$conexao = Conexao::pegarConexao();
    $usuarioDao = new usuarioDao();
    
    
    if($usuarioDao->inserir($usuario)) {

        
        Sessao::setSessao("success", "Cadastro realizado com sucesso");
        //header("Location: user-register-success.php");
    } else {
        Sessao::setSessao("danger", "Algum erro na criação");
        //header("Location: user-register.php");
    }
    
    
} catch (Exception $e) {
    Erro::trataErro($e);
}