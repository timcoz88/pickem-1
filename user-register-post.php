<?php
require_once("class/Usuario.php");
require_once("class/usuarioDao.php");
require_once("db/Connection.php");

try {
    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $tipoUsuario = 1;
    $ativo = 0;
    
    $usuario = new Usuario($email, $senha, $nome, $sobrenome, $tipoUsuario, $ativo);
    
    $conexao = Connection::getConnection();
    $usuarioDao = new usuarioDao($conexao);
    
    
    if($usuarioDao->insereUsuario($usuario)) {
        echo "<br/>Usuario criado com sucesso";
    }

    //iniciar sessão
    header("Location: index.php");
} catch (Exception $e) {
    Erro::trataErro($e);
}



/*
try {
    $categoria = new Categoria();
    $nome = $_POST['nome'];
    $categoria->nome = $nome;
    $categoria->inserir();
    
    header('Location: categorias.php');
} catch (Exception $e) {
    Erro::trataErro($e);
}

*/