<?php

class competicaoDao {
    
    function __construct($conexao) {
        $this->conexao = $conexao;
    }
    
    public static function listar() {
        $competicoes = array();
        
        $sql = "SELECT idCompeticao, nomeCompeticao, descricaoCompeticao FROM competicoes";
        $conexao = Conexao::pegarConexao();
        $sql = $conexao->query($sql);
        $competicoes = $sql->fetchAll();
        
        return $competicoes;
    }
    
    public function inserir() {
        
        
    }
    
    public function alterar() {
        
    }
    
    public function excluir() {
        
    }
    
    public static function listarAtivas() {
        $competicoes = array();
        
        $sql = "SELECT idCompeticao, nomeCompeticao, descricaoCompeticao, competicaoFinalizada FROM competicoes Where competicaoFinalizada != 1";
        $conexao = Conexao::pegarConexao();
        $sql = $conexao->query($sql);
        $competicoes = $sql->fetchAll();
        
        return $competicoes;
    }
}