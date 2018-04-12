<?php

class usuarioDao {
    
    
    function __construct() {
        $this->conexao = Conexao::pegarConexao();
    }
    
 
    
    
    public static function listar() {
        
        $usuarios = array();
        
        $sql = "SELECT idUsuario, nomeusuario, sobrenomeUsuario, emailUsuario, senhaUsuario, dataCadastro, usuarioAtivo, emailValidado, tipoUsuario FROM usuarios";
        $conexao = Conexao::pegarConexao();
        //$resultado = $conexao->query($sql);
        //$lista = $resultado->fetchAll();
        $sql = $this->conexao->prepare($sql);
        $sql->execute();
        
        
        
        while($usuario_array = $sql->fetch()) {
            $idUsuario = $usuario_array['idUsuario'];
            $nomeUsuario = $usuario_array['nomeusuario'];
            $sobrenomeUsuario = $usuario_array['sobrenomeUsuario'];
            $emailUsuario = $usuario_array['emailUsuario'];
            $senhaUsuario = $usuario_array['senhaUsuario'];
            $dataCadastro = $usuario_array['dataCadastro'];
            $usuarioAtivo = $usuario_array['usuarioAtivo'];
            $emailValidado = $usuario_array['emailValidado'];
            $tipoUsuario = $usuario_array['tipoUsuario'];
            
            $usuario = new Usuario();
            
            $usuario->setNomeUsuario($nomeUsuario);
            $usuario->setSobrenomeUsuario($sobrenomeUsuario);
            $usuario->setEmailUsuario($emailUsuario);
            $usuario->setSenhaUsuario($senhaUsuario);
            $usuario->setTipoUsuario($tipoUsuario);
            $usuario->setUsuarioAtivo($usuarioAtivo);
            $usuario->setDataCadastro($dataCadastro);
            $usuario->setEmailValidado($emailValidado);
            $usuario->setId($idUsuario);
            
            array_push($usuarios, $usuario);

        }
        
        return $usuarios;
            
        }
        
        
    public function inserir(Usuario $usuario) {
        $resultado = null;
        
        $nomeUsuario = $usuario->getNomeUsuario();
        $sobrenomeUsuario = $usuario->getSobrenomeUsuario();
        $emailUsuario = $usuario->getEmailUsuario();
        $senhaUsuario = $usuario->getSenhaUsuario();
        $dataCadastro = $usuario->getDataCadastro();
        

        $sql = "INSERT INTO usuarios (nomeUsuario, sobrenomeUsuario, emailUsuario, senhaUsuario, dataCadastro) values (?, ?, ?, ?, ?);";
        $sql = $this->conexao->prepare($sql);

        try {
            $resultado = $sql->execute(array($nomeUsuario, $sobrenomeUsuario, $emailUsuario, $senhaUsuario, $dataCadastro));

        } catch (PDOException $e) {
            echo $e->getMessage();
            if ($e->getCode() == 23000) {
                Sessao::setSessao("Danger", "Email jÃ¡ cadastrado");
            } else {
                Sessao::setSessao("Danger", $e->getMessage());
            }
        }
       
        return $resultado;
    }
    
    //CORRIGIR A CLASSE QUANDO FIZER O FORMULÃ�RIO DE USUÃ�RIO
    function alterar(Usuario $usuario, $idUsuario) {
        
        //$id = $usuario->getId();
        $nomeUsuario = $usuario->getNomeUsuario();
        $sobrenomeUsuario = $usuario->getSobrenomeUsuario();
        $emailUsuario = $usuario->getEmailUsuario();
        $senhaUsuario = $usuario->getSenhaUsuario();
        $tipoUsuario = $usuario->getTipoUsuario();
        $usuarioAtivo = $usuario->getUsuarioAtivo();
        $emailValidado = $usuario->getEmailValidado();
        
        
        $sql = "UPDATE usuarios SET nomeUsuario = ?, sobrenomeUsuario = ?, emailUsuario = ?, senhaUsuario = ?, tipoUsuario = ?, usuarioAtivo = ?, emailValidado = ?  WHERE idUsuario = ?";
        $sql = $this->conexao->prepare($sql);
        $sql->execute(array($nomeUsuario, $sobrenomeUsuario, $emailUsuario, $senhaUsuario, $tipoUsuario, $UsuarioAtivo, $emailValidado, $idUsuario));
        
        return $sql;
    }
    
    function excluir($idUsuario) {
        
        $sql = "delete from usuarios where idUsuario = ?";
        $sql = $this->conexao->prepare($sql);
        $sql->execute(array($idUsuario));
        
        return mysqli_query($this->conexao, $query);
    }
    
    function buscaUsuario($idUsuario) {
        
        
        $sql = "SELECT idUsuario, nomeusuario, sobrenomeUsuario, emailUsuario, senhaUsuario, dataCadastro, usuarioAtivo, emailValidado, tipoUsuario FROM usuarios WHERE idUsuario = ?";
        $sql = $this->conexao->prepare($sql);
        $sql->execute(array($idUsuario));
        
        if($sql->rowCount()>0) {
            $usuario_array = $sql->fetch();
            
            
            $idUsuario = $usuario_array['idUsuario'];
            $nomeUsuario = $usuario_array['nomeusuario'];
            $sobrenomeUsuario = $usuario_array['sobrenomeUsuario'];
            $emailUsuario = $usuario_array['emailUsuario'];
            $senhaUsuario = $usuario_array['senhaUsuario'];
            $dataCadastro = $usuario_array['dataCadastro'];
            $usuarioAtivo = $usuario_array['usuarioAtivo'];
            $emailValidado = $usuario_array['emailValidado'];
            $tipoUsuario = $usuario_array['tipoUsuario'];

            
            $usuario = new Usuario();
            
            $usuario->setNomeUsuario($nomeUsuario);
            $usuario->setSobrenomeUsuario($sobrenomeUsuario);
            $usuario->setEmailUsuario($emailUsuario);
            $usuario->setSenhaUsuario($senhaUsuario);
            $usuario->setTipoUsuario($tipoUsuario);
            $usuario->setUsuarioAtivo($usuarioAtivo);
            $usuario->setDataCadastro($dataCadastro);
            $usuario->setEmailValidado($emailValidado);
            $usuario->setIdUsuario($idUsuario);
            
            
            return $usuario;

        }
        
       
    }
    
    public function validaUsuario($emailUsuario, $senhaUsuario) {
        
        $sql = "SELECT idUsuario FROM usuarios WHERE emailUsuario = ? and senhaUsuario = ?";
        $sql = $this->conexao->prepare($sql);
        
        $sql->execute(array($emailUsuario, md5($senhaUsuario)));
        
        $usuario_array = $sql->fetch();
        
        if($sql->rowCount()>0) {
            return $usuario_array['idUsuario'];
        } else {
            return FALSE;
        }
        
    }
    
    public function ativaUsuario($idUsuario) {
        
        $sql = "UPDATE usuarios SET status = 1 WHERE MD5(idUsuario) = ?";
        $sql = $this->conexao->prepare($sql);
        
        $sql->execute(array($idUsuario));
        
        $usuario_array = $sql->fetch();
        
        if($sql->rowCount()>0) {
            return TRUE;
        } else {
            return FALSE;
        }
        
    }
    
    
    
}