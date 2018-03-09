<?php

require_once("class/Usuario.php");
require_once("class/usuarioDao.php");
require_once("db/Connection.php");

//pega conexão
$conexao = Connection::getConnection();


$email = "teste@email.com";
$senha = "senha123";
$tipoUsuario = 1;
$ativo = 1; 

echo "<br/>CRIA USUARIO";
var_dump($email);
var_dump($senha);
var_dump( $tipoUsuario);
var_dump( $ativo);


$usuario = new Usuario($email, $senha, $tipoUsuario, $ativo);


$usuarioDao = new usuarioDao($conexao);

if($usuarioDao->insereUsuario($usuario)) {
    echo "Usuario criado com sucesso";
}
