<?php

require_once ("global.php");

//pega conexão
$conexao = Conexao::pegarConexao();


$email = "teste@qualquer.com";
$senha = "senha123";
$nome = "joao";
$sobrenome = "das dores";
$tipoUsuario = 1;
$ativo = 1; 

echo "<br/>CRIA USUARIO";
var_dump($email);
var_dump($senha);
var_dump($nome);
var_dump($sobrenome);
var_dump( $tipoUsuario);
var_dump( $ativo);


$usuario = new Usuario($email, $senha, $nome, $sobrenome, $tipoUsuario, $ativo);
echo "<br/> USUARIO INSTANCIADO";
echo "<pre>";
print_r($usuario);
echo "</pre>";


$usuarioDao = new usuarioDao($conexao);

if($usuarioDao->insereUsuario($usuario)) {
    echo "<br/>Usuario criado com sucesso";
}

echo "<br/> LISTANDO TODOS OS USUARIOS <br/ <pre>";
$usuario = $usuarioDao->listaUsuario();
echo "</pre>";

echo "<br/> BUSCA USUARIO<br/";
$usuario = $usuarioDao->buscaUsuario(1);
echo "<pre>";
print_r($usuario);
echo "</pre>";


echo "<br/> <br/>ALTERA USUARIO<br/";
$novoUsuario = new Usuario("email@alterado222.com", "senha", "nom12345e ", "sobasdasdrenome", 1, 1);
$resultado = $usuarioDao->alteraUsuario($novoUsuario, 1);
var_dump($resultado);
echo "<pre>";
print_r($usuario);
echo "</pre>";
