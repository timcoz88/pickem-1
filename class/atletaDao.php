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
                ON a.regioes_idRegiao = r.idRegiao";
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
    
}