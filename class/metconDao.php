<?php

class metconDAO {
    
    function __construct($conexao) {
        $this->conexao = $conexao;
    }
    
    public static function listar() {
        $metcon = array();
        
        $sql = "SELECT idMetcon, nomeMetcon, descricaoMetcon , tipoMetcon FROM metcon";
        $conexao = Conexao::pegarConexao();
        $sql = $conexao->query($sql);
        $metcon = $sql->fetchAll();
        
        return $metcon;
    }
    
    public function inserir() {
        
        
    }
    
    public function alterar() {
        
    }
    
    public function excluir() {
        
    }
    
}