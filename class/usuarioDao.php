<?php

class usuarioDao {
    
    function __construct() {
        $this->conexao = Conexao::pegarConexao();
        //echo "<br/> entrei no CONSTRUCT DAO";
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
            
            $usuario = new Usuario($nomeUsuario, $sobrenomeUsuario, $emailUsuario, $senhaUsuario);
            
            $usuario->setDataCadastro($dataCadastro);
            $usuario->setUsuarioAtivo($usuarioAtivo);
            $usuario->setEmailValidado($emailValidado);
            $usuario->setTipoUsuario($tipoUsuario);
            $usuario->setId($idUsuario);
            
            array_push($usuarios, $usuario);
            
            /*
            echo "<pre>";
            print_r($usuarios);
            echo "</pre>";
            */
        }
        
        return $usuarios;
            
        }
        
        
    public function inserir(Usuario $usuario) {
        
        $nomeUsuario = $usuario->getNomeUsuario();
        $sobrenomeUsuario = $usuario->getSobrenomeUsuario();
        $emailUsuario = $usuario->getEmailUsuario();
        $senhaUsuario = $usuario->getSenhaUsuario();

        
        /*
        echo "<br/>USUARIO DAO";
        var_dump($email);
        var_dump($senha);
        var_dump( $tipoUsuario);
        var_dump( $ativo);
        */
     
        $sql = "INSERT INTO usuarios (nomeUsuario, sobrenomeUsuario, emailUsuario, senhaUsuario) values (?, ?, ?, ?);";
        $sql = $this->conexao->prepare($sql);
        
        /*
        echo "<br/>SQL";
        var_dump($sql);
        echo "<br/>-----";
        */
        try {
            $sql->execute(array($nomeUsuario, $sobrenomeUsuario, $emailUsuario, $senhaUsuario)); 
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
    function alterar(Usuario $usuario, $id) {
        
        //$id = $usuario->getId();
        $nomeUsuario = $usuario->getNomeUsuario();
        $sobrenomeUsuario = $usuario->getSobrenomeUsuario();
        $emailUsuario = $usuario->getEmailUsuario();
        $senhaUsuario = $usuario->getSenhaUsuario();
        $tipoUsuario = $usuario->getTipoUsuario();
        $usuarioAtivo = $usuario->getUsuarioAtivo();
        $emailValidado = $usuario->getEmailValidado();
        
        
        $sql = "UPDATE usuarios SET nomeUsuario = ?, sobrenomeUsuario = ?, emailUsuario = ?, senhaUsuario = ?, tipoUsuario = ?, usuarioAtivo = ?, emailValidado = ?  WHERE id = ?";
        $sql = $this->conexao->prepare($sql);
        $sql->execute(array($nomeUsuario, $sobrenomeUsuario, $emailUsuario, $senhaUsuario, $tipoUsuario, $UsuarioAtivo, $emailValidado, $id));
        
        return $sql;
    }
    
    function excluir($id) {
        
        $sql = "delete from usuarios where id = ?";
        $sql = $this->conexao->prepare($sql);
        $sql->execute(array($id));
        
        return mysqli_query($this->conexao, $query);
    }
    
    function buscaUsuario($id) {
        
        
        $sql = "SELECT idUsuario, nomeusuario, sobrenomeUsuario, emailUsuario, senhaUsuario, dataCadastro, usuarioAtivo, emailValidado, tipoUsuario FROM usuarios WHERE id = ?";
        $sql = $this->conexao->prepare($sql);
        $sql->execute(array($id));
        
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

            
            $usuario = new Usuario($nomeUsuario, $sobrenomeUsuario, $emailUsuario, $senhaUsuario);
            
            $usuario->setDataCadastro($dataCadastro);
            $usuario->setUsuarioAtivo($usuarioAtivo);
            $usuario->setEmailValidado($emailValidado);
            $usuario->setTipoUsuario($tipoUsuario);
            $usuario->setId($idUsuario);
            
            
            return $usuario;

        }
        
       
    }
    
    public function validaUsuario($emailUsuario, $senhaUsuario) {
        
        $sql = "SELECT idUsuario FROM usuarios WHERE emailUsuario = ? and senhaUsuario = ?";
        $sql = $this->conexao->prepare($sql);
        
        $sql->execute(array($emailUsuario, md5($senhaUsuario)));
        
        
        
        if($sql->rowCount()>0) {
            return TRUE;
        } else {
            return FALSE;
        }
        
    }
    
    
    
    
}