<?php
require_once ("global.php");
require_once ("cabecalho.php");



if (Sessao::getSessao("usuario_email")) {
	require_once ("index-logged.php");
    
} else {
    require_once ("index-main.php"); 

}

require_once ("rodape.php");
