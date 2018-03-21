<?php

class resultadoDao {
    
    function __construct($conexao) {
        $this->conexao = $conexao;
    }
    
    public static function listar() {
        $resultados = array();
        
        $sql = "SELECT metcon_idCompeticao, metcon_idMetcon, atletas_idAtleta, classificacao, pontos FROM resultados";
        $conexao = Conexao::pegarConexao();
        $sql = $conexao->query($sql);
        $resultados = $sql->fetchAll();
        
        return $resultados;
    }
    
    function inserir() {
        
    }
    
    function alterar() {
        
    }
    
    function excluir() {
        
    }
    
}