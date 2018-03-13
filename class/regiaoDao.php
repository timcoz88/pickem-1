<?php


class regiaoDao {
    
    function __construct() {
        $this->conexao = Conexao::pegarConexao();
    }
    
    function listar() {
        $regioes = array();
        
        $sql = "SELECT id, nome FROM regioes";
        $resultado = $conexao->query($sql);
        $regioes = $resultado->fetchAll();
        
        return $regioes;
    }
    
    function inserir() {
        
        
        $sql = "INSERT INTO regioes (nome) values (?);";
        $sql = $this->conexao->prepare($sql);
        
    }
    
    function alterar() {
        
    }
    
    function excluir() {
        
    }
    
}