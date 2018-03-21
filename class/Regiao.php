<?php


class Regiao {
    
    private $idRegiao;
    private $nomeRegiao;
    
    function __construct($nomeRegiao) {
        $this->nomeRegiao = $nomeRegiao;
    }
    
    public function getIdRegiao()
    {
        return $this->idRegiao;
    }

    public function getNomeRegiao()
    {
        return $this->nomeRegiao;
    }

    public function setIdRegiao($idRegiao)
    {
        $this->idRegiao = $idRegiao;
    }

    public function setNomeRegiao($nomeRegiao)
    {
        $this->nomeRegiao = $nomeRegiao;
    }

    
    
    
}