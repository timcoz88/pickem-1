<?php
require_once ("cabecalho.php");
require_once ("class/Usuario.php");
require_once ("class/Session.php");



if (Session::getSessao("usuario_logado")) {
    echo "<p class='text-success'>Você está logado como <?= usuarioLogado() ?>";
	require_once ("index-logged.php");
    
} else {
    require_once ("index-main.php"); 

}

require_once ("rodape.php");
