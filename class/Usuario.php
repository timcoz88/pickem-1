<?php

class Usuario
{

    private $id;
    private $email;
    private $senha;
    private $tipoUsuario;
    private $ativo;
    private $cadastro;
    private $status;

    function __construct($email, $senha, $tipoUsuario, $ativo) {
        echo "<br/>ENTREI NO CONSTRUCT USUARIO";
        $this->email = $email;
        $this->senha = $senha;
        $this->tipoUsuario = $tipoUsuario;
        $this->ativo = $ativo;
        
        /*
        echo "<br/>USUARIO";
        var_dump($this->email);
        var_dump($this->senha);
        var_dump($this->tipoUsuario);
        var_dump($this->ativo);
        */
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
    
    function usuarioEstaLogado() {
        return isset($_SESSION["usuario_logado"]);
    }
    
    function verificaUsuario() {
        if(!usuarioEstaLogado()) {
            $_SESSION["danger"] = "Você não tem acesso a esta funcionalidade.";
            header("Location: index.php");
            die();
        }
    }
    
    function usuarioLogado() {
        return $_SESSION["usuario_logado"];
    }
    
    function logaUsuario($email) {
        $_SESSION["usuario_logado"] = $email;
    }
    
    function logout() {
        session_destroy();
        session_start();
    }
    //essa função vai para o DAO
    function buscaUsuario($conexao, $email, $senha) {
        
        $senhaMd5 = md5($senha);
        $email = mysqli_real_escape_string($conexao, $email);
        $query = "select * from usuarios where email='{$email}' and senha='{$senhaMd5}'";
        $resultado = mysqli_query($conexao, $query);
        $usuario = mysqli_fetch_assoc($resultado);
        
        return $usuario;
    }

    
    
}