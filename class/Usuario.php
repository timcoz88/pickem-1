<?php

class Usuario
{

    private $id;
    private $email;
    private $senha;
    private $nome;
    private $sobrenome;
    private $tipoUsuario;
    private $ativo;
    private $cadastro;
    private $status;

    function __construct($email, $senha, $nome, $sobrenome, $tipoUsuario, $ativo) {
        $this->email = $email;
        $this->senha = $senha;
        $this->nome = $nome;
        $this->sobrenome = $sobrenome;
        $this->tipoUsuario = $tipoUsuario;
        $this->ativo = $ativo; 
    }
    
    
    /* Getters */
    
    public function getId()
    {
        return $this->id;
    }

    public function getEmail()
    {
        return $this->email;
    }
    
    public function getSenha()
    {
        return $this->senha;
    }
    
    public function getNome()
    {
        return $this->nome;
    }
    
    
    public function getSobrenome()
    {
        return $this->sobrenome;
    }

    public function getTipoUsuario()
    {
        return $this->tipoUsuario;
    }

    public function getAtivo()
    {
        return $this->ativo;
    }

    public function getCadastro()
    {
        return $this->cadastro;
    }
    
    public function getStatus()
    {
        return $this->status;
    }
    
    /* Setters */
    
    public function setId($id)
    {
        $this->id = $id;
    }
    
    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setSenha($senha)
    {
        $this->senha = md5($senha);
    }
    
    public function setNome($nome)
    {
        $this->nome = $nome;
    }
    
    public function setSobrenome($sobrenome)
    {
        $this->sobrenome = $sobrenome;
    }

    public function setTipoUsuario($tipoUsuario)
    {
        $this->tipoUsuario = $tipoUsuario;
    }

    public function setAtivo($ativo)
    {
        $this->ativo = $ativo;
    }

    public function setCadastro($cadastro)
    {
        $this->cadastro = $cadastro;
    }
    
    public function setStatus($status)
    {
        $this->status = $status;
    }
    
    /* Métodos */
    

  
    
    
}