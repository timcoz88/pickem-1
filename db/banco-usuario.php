<?php
require_once ("db/Connection.php");
//require_once("conecta.php");

$conexao = Connection::getConnection();

function buscaUsuario($conexao, $email, $senha) {

	$senhaMd5 = md5($senha);
	$email = mysqli_real_escape_string($conexao, $email);
	$query = "select * from usuarios where email='{$email}' and senha='{$senhaMd5}'";
	$resultado = mysqli_query($conexao, $query);
	$usuario = mysqli_fetch_assoc($resultado);

	return $usuario;
}




if (isset($_POST['email']) && empty($_POST['email'] == false)) {
    
    $email = addslashes($_POST['email']);
    
    $senha = md5(addslashes($_POST['senha']));
    
    $query = "SELECT * FROM usuarios WHERE email = '$email' and senha = '$senha'";
    
    $conexao = Connection::getConnection();
    
    $resultado = $conexao->query($query);
    
    if ($resultado->rowCount() > 0) {
        
        $dado = $resultado->fetch();
        
        print_r($dado);
        
        $_SESSION['id'] = $dado['id'];
        
        header("Location: index.php");
    }
}