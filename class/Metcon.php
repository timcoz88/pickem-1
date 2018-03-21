<?php

class Metcon {
    
  private $idMetcon;
  private $nomeMetcon;
  private $descricaoMetcon;
  private $tipoMetcon;
  
  public static function __construct($nomeMetcon, $descricaoMetcon, $tipoMetcon) {
      $this->idMetcon = $idMetcon;
      $this->nomeMetcon = $nomeMetcon;
      $this->descricaoMetcon = $descricaoMetcon;
      $this->tipoMetcon = $tipoMetcon;
  }
  
public function getIdMetcon()
    {
        return $this->idMetcon;
    }

public function getNomeMetcon()
    {
        return $this->nomeMetcon;
    }

public function getDescricaoMetcon()
    {
        return $this->descricaoMetcon;
    }

public function getTipoMetcon()
    {
        return $this->tipoMetcon;
    }

public function setIdMetcon($idMetcon)
    {
        $this->idMetcon = $idMetcon;
    }

public function setNomeMetcon($nomeMetcon)
    {
        $this->nomeMetcon = $nomeMetcon;
    }

public function setDescricaoMetcon($descricaoMetcon)
    {
        $this->descricaoMetcon = $descricaoMetcon;
    }

public function setTipoMetcon($tipoMetcon)
    {
        $this->tipoMetcon = $tipoMetcon;
    }

  
  
}