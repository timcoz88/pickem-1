<?php

class atletaDao {
    
    function __construct($conexao) {
        $this->conexao = $conexao;
    }
    
    public function listar() {
        $atletas = array();
        
        $sql = "SELECT a.id, a.nome, sobrenome, divisao, regiao_id, r.nome AS regiao_nome FROM atletas AS a INNER JOIN regioes AS r ON a.regiao_id = r.id";
        $sql = $this->conexao->query($sql);
        $atletas = $sql->fetchAll();
        
        
        
        
        return $atletas;
    }
    
    function inserir() {
        
        
        $sql = "INSERT INTO regioes (nome) values (?);";
        $sql = $this->conexao->prepare($sql);
        
    }
    
    function alterar() {
        
    }
    
    function excluir() {
        
    }
    
    public function listaAtletasParam() {
        
    }
    
}