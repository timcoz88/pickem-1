<?php

class palpiteDao
{

    function __construct()
    {
        $this->conexao = Conexao::pegarConexao();
        // echo "<br/> entrei no CONSTRUCT DAO";
    }

    public static function listar()
    {
        $palpites = array();
        
        $sql = "SELECT grupos_idUsuario, grupos_idGrupo, resultados_idCompeticao, resultados_idMetcon, resultados_idAtleta FROM palpites";
        $conexao = Conexao::pegarConexao();
        $sql = $conexao->query($sql);
        $palpites = $sql->fetchAll();
        
        return $palpites;
    }

    function inserir(Palpite $palpite)
    {
        $idUsuario = $palpite->getGrupos_idUsuario();
        $idGrupo = $palpite->getGrupos_idGrupo();
        $idCompeticao = $palpite->getResultados_idCompeticao();
        $idMetcon = $palpite->getResultados_idMetcon();
        $idAtleta = $palpite->getResultados_idAtleta();
        
        $sql = "INSERT INTO palpites (grupos_idGrupo, grupos_idUsuario, resultados_idCompeticao, resultados_idMetcon, resultados_idAtleta) values (?, ?, ?, ?, ?);";
        $sql = $this->conexao->prepare($sql);
        
        try {
            $sql->execute(array(
                $idGrupo,
                $idUsuario,
                $idCompeticao,
                $idMetcon,
                $idAtleta
            ));
        } catch (PDOException $e) {
            Erro::trataErro($e);
        }
        
        return $sql;
    }

    function alterar()
    {}

    function excluir()
    {}

    public function verificaPalpite(Palpite $palpite)
    {
        $resultados = array();
        $idUsuario = $palpite->getGrupos_idUsuario();
        $idGrupo = $palpite->getGrupos_idGrupo();
        $idCompeticao = $palpite->getResultados_idCompeticao();
        $idAtleta = $palpite->getResultados_idAtleta();
        
        echo "<br/>entrei<pre>";
        
        $sql = "SELECT idGrupo, idUsuario, idCompeticao, idAtleta, divisaoAtleta FROM palpites_completo
            WHERE idGrupo = ? AND idUsuario = ? AND idCompeticao = ? ";
        
        $sql = $this->conexao->prepare($sql);
        
        $sql->execute(array(
            $idGrupo,
            $idUsuario,
            $idCompeticao
        ));
        
        $resultados = $sql->fetchAll();
        
        if ($resultados) {
            if (count($resultados) > 1) {
                return "Você já votou para esta competição, exclua ou altere o seu voto anterior";
            } else {
                if ($resultados[0]['divisaoAtleta'] == 0) {
                    return "Você já votou em um atleta feminino para este evento, exclua ou altere o seu voto anterior";
                } else {
                    return "Você já votou em um atleta masculino para este evento, exclua ou altere o seu voto anterior";
                }
            }
        } 
        
        return FALSE;

    }

    public static function listarPorUsuario($idUsuario)
    {
        $palpites = array();
        
        $sql = "SELECT * FROM palpites_completo WHERE idUsuario = ?";
        $conexao = Conexao::pegarConexao();
        $sql = $conexao->prepare($sql);
        // $sql = $this->conexao->prepare($sql);
        $sql->execute(array(
            $idUsuario
        ));
        
        $palpites = $sql->fetchAll();
        echo "</pre>";
        return $palpites;
    }
}