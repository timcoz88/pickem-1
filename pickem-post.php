<?php
require_once ("global.php");

try {
    $idUsuario = $_POST['idUsuario'];
    $idGrupo = $_POST['idGrupo'];
    $idCompeticao = $_POST['idCompeticao'];
    $idMetcon = $_POST['idMetcon'];
    
    $idFemaleAtleta = $_POST['idFemaleAtleta'];
    $idMaleAtleta = $_POST['idMaleAtleta'];
    
    
    echo "<br/>idusuario: ".$_POST['idUsuario'];
    echo "<br/>idGrupo: ".$_POST['idGrupo'];
    echo "<br/>idCompeticao: ".$_POST['idCompeticao'];
    echo "<br/>idMetcon: ".$_POST['idMetcon'];
    echo "<br/>idFemaleAtleta: ".$_POST['idFemaleAtleta'];
    echo "<br/>idMaleAtleta: ".$_POST['idMaleAtleta'];

    
    $palpiteFemale = new Palpite($idUsuario, $idGrupo, $idCompeticao, $idMetcon, $idFemaleAtleta);
    $palpiteMale = new Palpite($idUsuario, $idGrupo, $idCompeticao, $idMetcon, $idMaleAtleta);
    
    //$conexao = Conexao::pegarConexao();
    $palpiteDao = new palpiteDao();
    
    //verificar se tem algum em branco e inserir
    
    if($palpiteDao->inserir($palpiteFemale) && $palpiteDao->inserir($palpiteMale)) {
        Sessao::setSessao("success", "Palpite realizado com sucesso");
    }
    
    //iniciar sessão
    header("Location: pickem.php");
} catch (Exception $e) {
    Erro::trataErro($e);
}

