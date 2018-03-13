<?php
require_once ("global.php");

try {
    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $tipoUsuario = 1;
    $ativo = 0;
    
    $usuario = new Usuario($email, $senha, $nome, $sobrenome, $tipoUsuario, $ativo);
    
    //$conexao = Conexao::pegarConexao();
    $usuarioDao = new usuarioDao();
    
    
    if($usuarioDao->insereUsuario($usuario)) {
        echo "<br/>Usuario criado com sucesso";
    }

    //iniciar sessão
    header("Location: index.php");
} catch (Exception $e) {
    Erro::trataErro($e);
}

