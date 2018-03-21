<?php

class Resultado {
    
    private $metcon_idCompeticao;
    private $metcon_idMetcon;
    private $atletas_idAtleta;
    private $classificacao;
    private $pontos;
    
    public static function __construct($metcon_idCompeticao, $metcon_idMetcon, $atletas_idAtleta) {
        $this->metcon_idCompeticao = $metcon_idCompeticao;
        $this->metcon_idMetcon = $metcon_idMetcon;
        $this->atletas_idAtleta = $atletas_idAtleta;
    }
    
    public function getMetcon_idCompeticao()
    {
        return $this->metcon_idCompeticao;
    }

    public function getMetcon_idMetcon()
    {
        return $this->metcon_idMetcon;
    }

    public function getAtletas_idAtleta()
    {
        return $this->atletas_idAtleta;
    }

    public function getClassificacao()
    {
        return $this->classificacao;
    }

    public function getPontos()
    {
        return $this->pontos;
    }

    public function setMetcon_idCompeticao($metcon_idCompeticao)
    {
        $this->metcon_idCompeticao = $metcon_idCompeticao;
    }

    public function setMetcon_idMetcon($metcon_idMetcon)
    {
        $this->metcon_idMetcon = $metcon_idMetcon;
    }

    public function setAtletas_idAtleta($atletas_idAtleta)
    {
        $this->atletas_idAtleta = $atletas_idAtleta;
    }

    public function setClassificacao($classificacao)
    {
        $this->classificacao = $classificacao;
    }

    public function setPontos($pontos)
    {
        $this->pontos = $pontos;
    }

    
    
    
}