<?php


class Atleta {
    
    private $id;
    private $nome;
    private $sobrenome;
    private $divisao;
    private $regiao;
    
    function __construct($id, $nome, $sobrenome, $divisao, Regiao $regiao ) {
        $this->id = $id;
        $this->nome = $nome;
        $this->sobrenome = $sobrenome;
        $this->divisao = $divisao;
        $this->regiao = $regiao;
    }
    
    public function getId()    {
        return $this->id;
    }

    public function getNome()    {
        return $this->nome;
    }

    public function getSobrenome()    {
        return $this->sobrenome;
    }

    public function getDivisao()    {
        return $this->divisao;
    }

    public function getRegiao()    {
        return $this->regiao;
    }

    public function setId($id)    {
        $this->id = $id;
    }

    public function setNome($nome)    {
        $this->nome = $nome;
    }

    public function setSobrenome($sobrenome)    {
        $this->sobrenome = $sobrenome;
    }

    public function setDivisao($divisao)    {
        $this->divisao = $divisao;
    }

    public function setRegiao($regiao)    {
        $this->regiao = $regiao;
    }


    
    
    
}