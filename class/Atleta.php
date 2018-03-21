<?php


class Atleta {
    
    private $idAtleta;
    private $nomeAtleta;
    private $sobrenomeAtleta;
    private $divisaoAtleta;
    private $regioes_idregiao;
    
    function __construct($idAtleta, $nomeAtleta, $sobrenomeAtleta, $divisaoAtleta, Regiao $regioes_idregiao ) {
        $this->idAtleta = $idAtleta;
        $this->nomeAtleta = $nomeAtleta;
        $this->sobrenomeAtleta = $sobrenomeAtleta;
        $this->divisaoAtleta = $divisaoAtleta;
        $this->regioes_idregiao = $regioes_idregiao;
    }
    
    
    /* Getters */
    
    public function getIdAtleta()
    {
        return $this->idAtleta;
    }

    public function getNomeAtleta()
    {
        return $this->nomeAtleta;
    }

    public function getSobrenomeAtleta()
    {
        return $this->sobrenomeAtleta;
    }

    public function getDivisaoAtleta()
    {
        return $this->divisaoAtleta;
    }

    public function getRegioes_idregiao()
    {
        return $this->regioes_idregiao;
    }

    /* Setters */
    
    public function setIdAtleta($idAtleta)
    {
        $this->idAtleta = $idAtleta;
    }

    public function setNomeAtleta($nomeAtleta)
    {
        $this->nomeAtleta = $nomeAtleta;
    }

    public function setSobrenomeAtleta($sobrenomeAtleta)
    {
        $this->sobrenomeAtleta = $sobrenomeAtleta;
    }

    public function setDivisaoAtleta($divisaoAtleta)
    {
        $this->divisaoAtleta = $divisaoAtleta;
    }

    public function setRegioes_idregiao($regioes_idregiao)
    {
        $this->regioes_idregiao = $regioes_idregiao;
    }

    /* Métodos */
    
    
    
}