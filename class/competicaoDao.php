<?php

class competicaoDAO {
    
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
    
}