<?php


class regiaoDao {
    
    function __construct($conexao) {
        $this->conexao = $conexao;
    }
    
    public static function listar() {
        $regioes = array();
        
        $sql = "SELECT * FROM regioes";
        $conexao = Conexao::pegarConexao();
        $sql = $conexao->query($sql);
        $regioes = $sql->fetchAll();
        
        
        
        
        return $regioes;
    }
    
    function inserir() {
        
        

        
    }
    
    function alterar() {
        
    }
    
    function excluir() {
        
    }
    
}