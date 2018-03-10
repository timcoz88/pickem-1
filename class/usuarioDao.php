<?php

class usuarioDao {
    
    function __construct($conexao) {
        $this->conexao = $conexao;
        //echo "<br/> entrei no CONSTRUCT DAO";
    }
    
    function listaUsuario() {
        
        $usuarios = array();
        
        $sql = "SELECT * FROM usuarios";
        $sql = $this->conexao->prepare($sql);
        $sql->execute();
        
        while($usuario_array = $sql->fetchAll()) {
            $id = $usuario_array['id'];
            $email = $usuario_array['email'];
            $senha = $usuario_array['senha'];
            $tipoUsuario = $usuario_array['tipoUsuario'];
            $ativo = $usuario_array['ativo'];
            $cadastro = $usuario_array['cadastro'];
            $status = $usuario_array['status'];
            
            $usuario = new Usuario($email, $senha, $tipoUsuario, $ativo, $cadastro, $status);
            
            
            $usuario->setId($id);
            
            array_push($usuarios, $usuario);
        }
        
        return $usuarios;
            
        }
        
        
    function insereUsuario(Usuario $usuario) {
        
        $email = $usuario->getEmail();
        $senha = $usuario->getSenha();
        $tipoUsuario = $usuario->getTipoUsuario();
        $ativo = $usuario->getAtivo();
        
        /*
        echo "<br/>USUARIO DAO";
        var_dump($email);
        var_dump($senha);
        var_dump( $tipoUsuario);
        var_dump( $ativo);
        */
     
        $sql = "INSERT INTO usuarios (email, senha, tipoUsuario, ativo) values (?, ?, ?, ?);";
        $sql = $this->conexao->prepare($sql);
        
        /*
        echo "<br/>SQL";
        var_dump($sql);
        echo "<br/>-----";
        */
        
        $sql->execute(array($email, $senha, $tipoUsuario, $ativo));
       
        return $sql;
        
                
    }
    
    function alteraUsuario(Usuario $usuario) {
        $id = $usuario->getId();
        $email = $usuario->getEmail();
        $senha = $usuario->getSenha();
        $tipoUsuario = $usuario->getTipoUsuario();
        $ativo = $usuario->getAtivo();
        $status = $usuario->getStatus();
        
        
        $sql = "UPDATE usuarios SET email = ?, senha = ?, tipoUsuario = ?, ativo = ?, status = ? WHERE id = ?";
        $sql = $this->conexao->prepare($sql);
        $sql->execute(array($email, $senha, $tipoUsuario, $ativo, $status, $id));
        
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
            $tipoUsuario = $resultado['tipoUsuario'];
            $ativo = $resultado['ativo'];
            $cadastro = $resultado['cadastro'];
            $status = $resultado['status'];
            
            $usuario = new Usuario($email, $senha, $tipoUsuario, $ativo);
            
            $usuario->setId($resultado['id']);
            
            return $usuario;

        }
        
       
    }
    
    public function logaUsuario($email, $senha) {
        
        var_dump($email);
        var_dump($senha);
        
        $sql = "SELECT * FROM usuarios WHERE email = ? and senha = ?";
        $sql = $this->conexao->prepare($sql);
        $sql->execute(array($email, md5($senha)));
        
        var_dump($sql);
        
        if($sql->rowCount()>0) {
            $resultado = $sql->fetch();
            var_dump($resultado);
            
            $email = $resultado['email'];
            $senha = $resultado['senha'];
            $tipoUsuario = $resultado['tipoUsuario'];
            $ativo = $resultado['ativo'];
            $cadastro = $resultado['cadastro'];
            $status = $resultado['status'];
            
            $usuario = new Usuario($email, $senha, $tipoUsuario, $ativo);
            
            $usuario->setId($resultado['id']);
            
            return $usuario;
            
        }
        
    }
    
    
    
    
}