<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);
function carregaClasse($nomeDaClasse) {
    require_once("class/".$nomeDaClasse.".php");
}

spl_autoload_register("carregaClasse");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport"
	content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">
<!--  forma como o navegador tem que renderizar, 
zoom (não tem zoom em página responsiva, 
não comprimir os elementos(o bootstrap que faz)  -->

<!-- CSS -->
<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
<link rel="stylesheet" href="assets/css/style.css" />

<title>CFPickEm</title>
</head>
<body>


	<nav class="navbar navbar-expand-md bg-dark fixed-top">
		<!-- BRAND -->
		<a class="navbar-brand" href="#">mademano.com</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse"
			data-target="#navbarsExampleDefault"
			aria-controls="navbarsExampleDefault" aria-expanded="false"
			aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<!-- xxxx -->
		<div class="collapse navbar-collapse" id="navbarsExampleDefault">
			<ul class="navbar-nav mr-auto">

				<li class="nav-item"><a class="nav-link"
					href="index.php">Home</a></li>
                

				<li class="nav-item dropdown"><a class="nav-link dropdown-toggle"
					href="#" id="dropdown01" data-toggle="dropdown"
					aria-haspopup="true" aria-expanded="false">PickEm</a>
					<div class="dropdown-menu" aria-labelledby="dropdown01">
						<a class="dropdown-item" href="pickem.php">Pick</a> 
						<a class="dropdown-item" href="mypicks.php">My Picks</a>
						<a class="dropdown-item" href="leaderboard.php">Leaderboard</a>
					</div>
                    
                </li>
			</ul>
			<!--  itens da navbar que ficam a direita -->
			<ul class="navbar-nav navbar-right">
				<li class="nav-item dropdown"><a class="nav-link dropdown-toggle"
					href="#" id="dropAdmin" data-toggle="dropdown" aria-haspopup="true"
					aria-expanded="false">Admin</a>
					<div class="dropdown-menu" aria-labelledby="dropAdmin">
						<a class="dropdown-item" href="mng-users.php">Users</a> <a
							class="dropdown-item" href="mng-athletes.php">Athletes</a> <a
							class="dropdown-item" href="mng-competitions.php">Competitions</a>
						<a class="dropdown-item" href="mng-events.php">Events</a> <a
							class="dropdown-item" href="mng-groups.php">Groups</a>
					</div>
					
					</li>
				<li class="nav-item"><a class="nav-link"
					href="login.php">Login</a></li>
			</ul>
		</div>
	</nav>
<main role="main" class="container">
	