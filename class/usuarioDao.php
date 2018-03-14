<?php

class usuarioDao {
    
    function __construct() {
        $this->conexao = Conexao::pegarConexao();
        //echo "<br/> entrei no CONSTRUCT DAO";
    }
    
    function listar() {
        
        $usuarios = array();
        
        $sql = "SELECT id, email, senha, nome, sobrenome, tipoUsuario, ativo, cadastro, status FROM usuarios";
        $conexao = Conexao::pegarConexao();
        //$resultado = $conexao->query($sql);
        //$lista = $resultado->fetchAll();
        $sql = $this->conexao->prepare($sql);
        $sql->execute();
        
        
        
        while($usuario_array = $sql->fetch()) {
            $id = $usuario_array['id'];
            $email = $usuario_array['email'];
            $senha = $usuario_array['senha'];
            $nome = $usuario_array['nome'];
            $sobrenome = $usuario_array['sobrenome'];
            $tipoUsuario = $usuario_array['tipoUsuario'];
            $ativo = $usuario_array['ativo'];
            $cadastro = $usuario_array['cadastro'];
            $status = $usuario_array['status'];
            
            $usuario = new Usuario($email, $senha, $nome, $sobrenome, $tipoUsuario, $ativo, $cadastro, $status);
            
            
            $usuario->setId($id);
            
            array_push($usuarios, $usuario);
            
            echo "<pre>";
            print_r($usuarios);
            echo "</pre>";
        }
        
        return $usuarios;
            
        }
        
        
    public function inserir(Usuario $usuario) {
        
        $email = $usuario->getEmail();
        $senha = $usuario->getSenha();
        $nome = $usuario->getNome();
        $sobrenome = $usuario->getSobrenome();
        $tipoUsuario = $usuario->getTipoUsuario();
        $ativo = $usuario->getAtivo();
        
        /*
        echo "<br/>USUARIO DAO";
        var_dump($email);
        var_dump($senha);
        var_dump( $tipoUsuario);
        var_dump( $ativo);
        */
     
        $sql = "INSERT INTO usuarios (email, senha, nome, sobrenome, tipoUsuario, ativo) values (?, ?, ?, ?, ?, ?);";
        $sql = $this->conexao->prepare($sql);
        
        /*
        echo "<br/>SQL";
        var_dump($sql);
        echo "<br/>-----";
        */
        try {
            $sql->execute(array($email, $senha, $nome, $sobrenome, $tipoUsuario, $ativo)); 
        } catch (PDOException $e) {

            //echo $e->getCode();
            //echo $e->getMessage();

            if ($e->getCode() == 23000) {
                Sessao::setSessao("Danger", "Email já cadastrado");
                //header("Location: index.php");
                echo "<br/>Email já cadastrado<br/>";
            }
        }
       
        return $sql;
        
                
    }
    
    //CORRIGIR A CLASSE QUANDO FIZER O FORMULÁRIO DE USUÁRIO
    function alteraUsuario(Usuario $usuario, $id) {
        
        //$id = $usuario->getId();
        $email = $usuario->getEmail();
        $senha = $usuario->getSenha();
        $nome = $usuario->getNome();
        $sobrenome = $usuario->getSobrenome();
        $tipoUsuario = $usuario->getTipoUsuario();
        $ativo = $usuario->getAtivo();
        $status = $usuario->getStatus();
        
        
        $sql = "UPDATE usuarios SET email = ?, senha = ?, nome = ?, sobrenome = ?, tipoUsuario = ?, ativo = ?  WHERE id = ?";
        $sql = $this->conexao->prepare($sql);
        $sql->execute(array($email, $senha, $nome, $sobrenome, $tipoUsuario, $ativo, $id));
        
        return $sql;
    }
    
    function removeUsuario($id) {
        
        $sql = "delete from produtos where id = ?";
        $sql = $this->conexao->prepare($sql);
        $sql->execute(array($id));
        
        return mysqli_query($this->conexao, $query);
    }
    
    function buscaUsuario($id) {
        
        
        $sql = "SELECT * FROM usuarios WHERE id = ?";
        $sql = $this->conexao->prepare($sql);
        $sql->execute(array($id));
        
        if($sql->rowCount()>0) {
            $resultado = $sql->fetch();
            
            
            
            $email = $resultado['email'];
            $senha = $resultado['senha'];
            $nome = $resultado['nome'];
            $sobrenome = $resultado['sobrenome'];
            $tipoUsuario = $resultado['tipoUsuario'];
            $ativo = $resultado['ativo'];
            $cadastro = $resultado['cadastro'];
            $status = $resultado['status'];
            
            $usuario = new Usuario($email, $senha, $tipoUsuario, $ativo);
            
            $usuario->setId($resultado['id']);
            
            return $usuario;

        }
        
       
    }
    
    public function verificaUsuario($email, $senha) {
        
        $sql = "SELECT * FROM usuarios WHERE email = ? and senha = ?";
        $sql = $this->conexao->prepare($sql);
        
        $sql->execute(array($email, md5($senha)));
        
        
        
        if($sql->rowCount()>0) {
            $resultado = $sql->fetch();
        
            
            $email = $resultado['email'];
            $senha = $resultado['senha'];
            $nome = $resultado['nome'];
            $sobrenome = $resultado['sobrenome'];
            $tipoUsuario = $resultado['tipoUsuario'];
            $ativo = $resultado['ativo'];
            $cadastro = $resultado['cadastro'];
            $status = $resultado['status'];
            
            $usuario = new Usuario($email, $senha, $tipoUsuario, $nome, $sobrenome, $ativo);
            
            $usuario->setId($resultado['id']);
            
            return $usuario;
            
        }
        
    }
    
    
    
    
}