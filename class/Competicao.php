<?php

class Competicao {
    
    private $idCompeticao;
    private $nomeCompeticao;
    private $anoCompeticao;
    private $descricaoCompeticao;
    
    public static function __construct($nomeCompeticao, $anoCompeticao, $descricaoCompeticao) {
        $this->nomeCompeticao = $nomeCompeticao;
        $this->anoCompeticao = $anoCompeticao;
        $this->descricaoCompeticao = $descricaoCompeticao;
    }
    
    public function getIdCompeticao()
    {
        return $this->idCompeticao;
    }

    public function getNomeCompeticao()
    {
        return $this->nomeCompeticao;
    }

    public function getAnoCompeticao()
    {
        return $this->anoCompeticao;
    }

    public function getDescricaoCompeticao()
    {
        return $this->descricaoCompeticao;
    }

    public function setIdCompeticao($idCompeticao)
    {
        $this->idCompeticao = $idCompeticao;
    }

    public function setNomeCompeticao($nomeCompeticao)
    {
        $this->nomeCompeticao = $nomeCompeticao;
    }

    public function setAnoCompeticao($anoCompeticao)
    {
        $this->anoCompeticao = $anoCompeticao;
    }

    public function setDescricaoCompeticao($descricaoCompeticao)
    {
        $this->descricaoCompeticao = $descricaoCompeticao;
    }

    
    
}