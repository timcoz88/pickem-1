<?php


class palpiteDao {
    
    function __construct($conexao) {
        $this->conexao = $conexao;
    }
    
    public static function listar() {
        $palpites = array();
        
        $sql = "SELECT grupos_idUsuario, grupos_idGrupo, resultados_idCompeticao, resultados_idMetcon, resultados_idAtleta FROM palpites";
        $conexao = Conexao::pegarConexao();
        $sql = $conexao->query($sql);
        $palpites = $sql->fetchAll();
        
        return $palpites;
    }
    
    function inserir() {
        
    }
    
    function alterar() {
        
    }
    
    function excluir() {
        
    }
    
}