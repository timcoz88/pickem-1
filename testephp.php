<?php
session_start();
require_once ("global.php");
//Sessao::setSessao("teste@sessao.com");

$conexao = Conexao::pegarConexao();
$regioes = new regiaoDao($conexao);
print_r($regioes->listar());