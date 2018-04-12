<?php

class Usuario
{

    private $idUsuario;
    private $emailUsuario;
    private $senhaUsuario;
    private $nomeUsuario;
    private $sobrenomeUsuario;
    private $tipoUsuario;
    private $usuarioAtivo;
    private $dataCadastro;
    private $emailValidado;

    /*
    function __construct($nomeUsuario, $sobrenomeUsuario, $emailUsuario, $senhaUsuario) {
        $this->nomeUsuario = $nomeUsuario;
        $this->sobrenomeUsuario = $sobrenomeUsuario;
        $this->emailUsuario = $emailUsuario;
        $this->senhaUsuario = $senhaUsuario;
    }
    */
    
    /* Getters */
    
    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    public function getEmailUsuario()
    {
        return $this->emailUsuario;
    }
    
    public function getSenhaUsuario()
    {
        return $this->senhaUsuario;
    }
    
    public function getNomeUsuario()
    {
        return $this->nomeUsuario;
    }
    
    public function getSobrenomeUsuario()
    {
        return $this->sobrenomeUsuario;
    }

    public function getTipoUsuario()
    {
        return $this->tipoUsuario;
    }

    public function getEmailValidado()
    {
        return $this->emailValidado;
    }

    public function getDataCadastro()
    {
        return $this->dataCadastro;
    }
    
    public function getUsuarioAtivo()
    {
        return $this->usuarioAtivo;
    }
    
    /* Setters */
    
    

    public function setIdUsuario($id)
    {
        $this->idUsuario = $id;
    }
    
    public function setEmailUsuario($emailUsuario)
    {
        $this->emailUsuario = $emailUsuario;
    }

    public function setSenhaUsuario($senhaUsuario)
    {
        $this->senhaUsuario = md5($senhaUsuario);
    }
    
    public function setNomeUsuario($nomeUsuario)
    {
        $this->nomeUsuario = $nomeUsuario;
    }
    
    public function setSobrenomeUsuario($sobrenomeUsuario)
    {
        $this->sobrenomeUsuario = $sobrenomeUsuario;
    }

    public function setTipoUsuario($tipoUsuario)
    {
        $this->tipoUsuario = $tipoUsuario;
    }

    public function setUsuarioAtivo($usuarioAtivo)
    {
        $this->usuarioAtivo = $usuarioAtivo;
    }

    public function setDataCadastro($dataCadastro)
    {
        $this->dataCadastro = $dataCadastro;
    }
    
    public function setEmailValidado($emailValidado)
    {
        $this->emailValidado = $emailValidado;
    }
    
    /* Métodos */
    

  
    
    
}