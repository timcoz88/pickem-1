<?php

class Grupo {
    
    private $idGrupo;
    private $nomeGrupo;
    private $descricaoGrupo;
    
    public static function __construct($nomeGrupo, $descricaoGrupo) {
        $this->nomeGrupo = $nomeGrupo;
        $this->descricaoGrupo = $descricaoGrupo;
    }
    
    
    public function getIdGrupo()
    {
        return $this->idGrupo;
    }

    public function getNomeGrupo()
    {
        return $this->nomeGrupo;
    }

    public function getDescricaoGrupo()
    {
        return $this->descricaoGrupo;
    }

    public function setIdGrupo($idGrupo)
    {
        $this->idGrupo = $idGrupo;
    }

    public function setNomeGrupo($nomeGrupo)
    {
        $this->nomeGrupo = $nomeGrupo;
    }

    public function setDescricaoGrupo($descricaoGrupo)
    {
        $this->descricaoGrupo = $descricaoGrupo;
    }

    
}