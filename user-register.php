<?php require_once ("cabecalho.php"); ?>

<?php 

/*
$pdo->query('INSERT ... ')
$id = $pdo->lastInsertId();

$md5 = md5($id);
$link = 'http://www.mademano.com/cadastroconfirma/confirmar.php?h='.$md5;

$assunto = "Confirme seu cadastro";
$msg = "Clique no link abaixo para confirmar o seu cadastro:\n\n".$link;
$headers = "From: suport@mademano.com"."\r\n"."X-Mailer: PHP/".phpversion();

mail($email, $assunto, $msg, $headers);

echo
exit




*/

?>







<h1>Formulário de usuário</h1>
<form action="user-register-post.php" method="post">
	<table class="table">
		<tr>
			<td>Nome</td>
			<td><input class="form-control" type="text" name="nome"	value=""></td>
		</tr>
		<tr>
			<td>E-mail</td>
			<td><input class="form-control" type="number" step="0.01"
				name="preco" value=""></td>
		</tr>
		<tr>
			<td>Password</td>
			<td><input class="form-control" type="password" name="nome"	value=""></td>
		</tr>
		<tr>
			<td>Confirm Password</td>
			<td><input class="form-control" type="password" name="nome"	value=""></td>
		</tr>
		<tr>
			<td>
				<button class="btn btn-primary" type="submit">Cadastrar</button>
			</td>
			<td>
				<button class="btn btn-secondary" type="submit">Cancelar</button>
			</td>
		</tr>
	</table>
</form>






<?php require_once ("rodape.php"); ?>