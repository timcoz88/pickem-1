<?php
require_once ("cabecalho.php");
require_once ("class/Usuario.php");
require_once ("db/banco-usuario.php");

if (usuarioEstaLogado()) { ?>
    <p class="text-success">Você está logado como <?= usuarioLogado() ?>. <a href="logout.php">Deslogar</a></p>
<?php     require_once ("index-logged.php");
    
} else {
    
    require_once ("index-main.php"); 

}

require_once ("rodape.php");
