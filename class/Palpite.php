<?php


class Palpite {
    
    private $grupos_idGrupo;
    private $grupos_idUsuario;
    private $resultados_idCompeticao;
    private $resultados_idMetcon;
    private $resultados_idAtleta;
    
    public static function __construct($grupos_idUsuario, $grupos_idGrupo, $resultados_idCompeticao, $resultados_idMetcon, $resultados_idAtleta) {
        $this->grupos_idGrupo = $grupos_idGrupo;
        $this->grupos_idUsuario = $grupos_idUsuario;
        $this->resultados_idCompeticao = $resultados_idCompeticao;
        $this->resultados_idMetcon = $resultados_idMetcon;
        $this->resultados_idAtleta = $resultados_idAtleta;
    }
    
    public function getGrupos_idGrupo()
    {
        return $this->grupos_idGrupo;
    }

    public function getGrupos_idUsuario()
    {
        return $this->grupos_idUsuario;
    }

    public function getResultados_idCompeticao()
    {
        return $this->resultados_idCompeticao;
    }

    public function getResultados_idMetcon()
    {
        return $this->resultados_idMetcon;
    }

    public function getResultados_idAtleta()
    {
        return $this->resultados_idAtleta;
    }

    public function setGrupos_idGrupo($grupos_idGrupo)
    {
        $this->grupos_idGrupo = $grupos_idGrupo;
    }

    public function setGrupos_idUsuario($grupos_idUsuario)
    {
        $this->grupos_idUsuario = $grupos_idUsuario;
    }

    public function setResultados_idCompeticao($resultados_idCompeticao)
    {
        $this->resultados_idCompeticao = $resultados_idCompeticao;
    }

    public function setResultados_idMetcon($resultados_idMetcon)
    {
        $this->resultados_idMetcon = $resultados_idMetcon;
    }

    public function setResultados_idAtleta($resultados_idAtleta)
    {
        $this->resultados_idAtleta = $resultados_idAtleta;
    }

}