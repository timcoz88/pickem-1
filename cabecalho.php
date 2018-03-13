<?php
session_start();
require_once ("class/Session.php");
require_once ("class/Usuario.php");
require_once("mostra-alerta.php");
error_reporting(E_ALL ^ E_NOTICE);

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
<link rel="stylesheet"
	href="assets/font-awesome/css/font-awesome.min.css" />

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

				<li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>


				<li class="nav-item dropdown"><a class="nav-link dropdown-toggle"
					href="#" id="dropdown01" data-toggle="dropdown"
					aria-haspopup="true" aria-expanded="false">PickEm</a>
					<div class="dropdown-menu" aria-labelledby="dropdown01">
						<a class="dropdown-item" href="pickem.php">Pick</a> <a
							class="dropdown-item" href="mypicks.php">My Picks</a> <a
							class="dropdown-item" href="leaderboard.php">Leaderboard</a>
					</div></li>
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
					</div></li>

            <!--  Aqui vem o php do email do infeliz -->
            <?php if (Session::usuarioLogado()) { ?>
				<li class="nav-item dropdown"><a class="nav-link dropdown-toggle"
					href="#" id="dropUser" data-toggle="dropdown" aria-haspopup="true"
					aria-expanded="false"><?php echo Session::usuarioLogado();?></a>
					<div class="dropdown-menu" aria-labelledby="dropAdmin">
						<a class="dropdown-item" href="#">Profile</a> <a
							class="dropdown-item" href="#">Settings</a> <a
							class="dropdown-item" href="logout.php">Logout</a>
					</div>
				</li>
			<?php } else { ?>
				<li class="nav-item"><a class="nav-link" href="user-login.php">Login</a></li>
			<?php }?>


			</ul>
		</div>
	</nav>
	<main role="main" class="container">
	<div class="top-content">
			<?php mostraAlerta("success"); ?>
			<?php mostraAlerta("danger"); ?>