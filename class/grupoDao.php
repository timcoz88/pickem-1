<?php

class grupoDao {
    
    function __construct($conexao) {
        $this->conexao = $conexao;
    }
    
    public static function listar() {
        $grupos = array();
        
        $sql = "SELECT idGrupo, nomeGrupo, descricaoGrupo FROM grupos";
        $conexao = Conexao::pegarConexao();
        $sql = $conexao->query($sql);
        $grupos = $sql->fetchAll();
        
        return $grupos;
    }
    
    public function inserir() {
        
        
    }
    
    public function alterar() {
        
    }
    
    public function excluir() {
        
    }
    
}