<?php require_once ("cabecalho.php");

error_reporting(E_ALL ^ E_NOTICE);
require_once ("db/Connection.php");

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

require_once ("cabecalho.php");

?>

<br/>
<br/> 
<br/>





<h2>Login</h2>

<form action="login.php" method="post">

	<div class="form-group">

		<label for="exampleInputEmail1">Email address</label> <input
			type="email" name="email" class="form-control" id="email"
			aria-describedby="emailHelp" placeholder="Enter email"> <small
			id="emailHelp" class="form-text text-muted">We'll never share your
			email with anyone else.</small>


		<label for="exampleInputPassword1">Password</label> <input
			type="password" class="form-control" name="senha" id="senha"
			placeholder="Password">

	</div>

	<div class="form-check">

		<input type="checkbox" class="form-check-input" id="exampleCheck1"> <label
			class="form-check-label" for="exampleCheck1">Check me out</label>

	</div>

	<button type="submit" class="btn btn-primary">Login</button>

</form>









<?php require_once ("rodape.php"); ?>