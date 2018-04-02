<?php


class palpiteDao {
    
    function __construct() {
        $this->conexao = Conexao::pegarConexao();
        //echo "<br/> entrei no CONSTRUCT DAO";
    }
    
    public static function listar() {
        $palpites = array();
        
        $sql = "SELECT grupos_idUsuario, grupos_idGrupo, resultados_idCompeticao, resultados_idMetcon, resultados_idAtleta FROM palpites";
        $conexao = Conexao::pegarConexao();
        $sql = $conexao->query($sql);
        $palpites = $sql->fetchAll();
        
        return $palpites;
    }
    
    function inserir(Palpite $palpite) {
        
    }
    
    function alterar() {
        
    }
    
    function excluir() {
        
    }
    
}