<?php

class atletaDao {
    
    function __construct($conexao) {
        $this->conexao = $conexao;
    }
    
    public static function listar() {
        $atletas = array();
        
        $sql = "SELECT a.idAtleta, a.nomeAtleta, a.sobrenomeAtleta, a.divisaoAtleta, r.nomeRegiao AS regiao_nome 
                FROM atletas AS a 
                INNER JOIN regioes AS r 
                ON a.regioes_idRegiao = r.idRegiao
                ORDER BY a.nomeAtleta, a.sobrenomeAtleta";
        $conexao = Conexao::pegarConexao();
        $sql = $conexao->query($sql);
        $atletas = $sql->fetchAll();
        
        return $atletas;
    }
    
    function inserir() {

        
    }
    
    function alterar() {
        
    }
    
    function excluir() {
        
    }
    
    public function listarAtletasParam() {
        $atletas = array();
        
        $sql = "SELECT a.idAtleta, a.nomeAtleta, a.sobrenomeAtleta, a.divisaoAtleta, r.nomeRegiao AS regiao_nome
                FROM atletas AS a
                INNER JOIN regioes AS r
                ON a.regioes_idRegiao = r.idRegiao
                WHERE 1=1";
        $conexao = Conexao::pegarConexao();
        $sql = $conexao->query($sql);
        $atletas = $sql->fetchAll();
        
        return $atletas;
    }
    
    public static function listarFemale() {
        $atletas = array();
        
        $sql = "SELECT a.idAtleta, a.nomeAtleta, a.sobrenomeAtleta, a.divisaoAtleta, r.nomeRegiao AS regiao_nome
                FROM atletas AS a
                INNER JOIN regioes AS r
                ON a.regioes_idRegiao = r.idRegiao
                WHERE a.divisaoAtleta = 0";
        $conexao = Conexao::pegarConexao();
        $sql = $conexao->query($sql);
        $atletas = $sql->fetchAll();
        
        return $atletas;
    }
    
    public static function listarMale() {
        $atletas = array();
        
        $sql = "SELECT a.idAtleta, a.nomeAtleta, a.sobrenomeAtleta, a.divisaoAtleta, r.nomeRegiao AS regiao_nome
                FROM atletas AS a
                INNER JOIN regioes AS r
                ON a.regioes_idRegiao = r.idRegiao
                WHERE a.divisaoAtleta = 1";
        $conexao = Conexao::pegarConexao();
        $sql = $conexao->query($sql);
        $atletas = $sql->fetchAll();
        
        return $atletas;
    }
    
    public function buscaPorId(String $idAtleta) {
        
        
        $sql = "SELECT a.idAtleta, a.nomeAtleta, a.sobrenomeAtleta, a.divisaoAtleta, r.nomeRegiao AS regiao_nome
                FROM atletas AS a
                INNER JOIN regioes AS r
                ON a.regioes_idRegiao = r.idRegiao
                WHERE a.idAtleta = ?";
        $conexao = Conexao::pegarConexao();
        $sql = $conexao->prepare($sql);
        
        $sql->execute($idAtleta);
        
        $atleta = $sql->fetch();
        
        return $atleta;
    }
    
}