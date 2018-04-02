<?php
require_once ("global.php");

try {
    $idCompeticao = $_POST['idCompeticao'];
    $idMetcon = $_POST['idMetcon'];
    $idFemaleAtleta = $_POST['idFemaleAtleta'];
    $idMaleAtleta = $_POST['idMaleAtleta'];
    $idGrupo = idGrupo;
    $idUsuario = idGrupo;
    
    
    $palpiteFemale = new Palpite($idUsuario, $idGrupo, $idCompeticao, $idMetcon, $idFemaleAtleta);
    $palpiteMale = new Palpite($idUsuario, $idGrupo, $idCompeticao, $idMetcon, $idMaleAtleta);
    
    //$conexao = Conexao::pegarConexao();
    $palpiteDao = new palpiteDao();
    
    //verificar se tem algum em branco e inserir
    
    if($palpiteDao->inserir($palpiteFemale) && $palpiteDao->inserir($palpiteMale)) {
        Sessao::setSessao("success", "Palpite realizado com sucesso");
    }
    
    //iniciar sessão
    header("Location: index.php");
} catch (Exception $e) {
    Erro::trataErro($e);
}

