<?php
require_once ("global.php");
session_start();
try {
    $idUsuario = $_POST['idUsuario'];
    $idGrupo = $_POST['idGrupo'];
    $idCompeticao = $_POST['idCompeticao'];
    $idMetcon = $_POST['idMetcon'];
    $idAtleta = $_POST['idAtleta'];

    
    $palpite = new Palpite($idUsuario, $idGrupo, $idCompeticao, $idMetcon, $idAtleta);
    
    
    // $conexao = Conexao::pegarConexao();
    $palpiteDao = new palpiteDao();
    
    // verificar se tem algum em branco e inserir
    
    if ($motivo = $palpiteDao->verificaPalpite($palpite)) {
        print_r($motivo);
        Sessao::setSessao("danger", $motivo);
    } else {
        if ($palpiteDao->inserir($palpite)) {
            Sessao::setSessao("success", "Palpite realizado com sucesso");
        }
    }
    
    // iniciar sessão
    header("Location: pickem.php");
} catch (Exception $e) {
    Erro::trataErro($e);
}

