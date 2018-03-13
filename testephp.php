<?php
session_start();
require_once ("global.php");
//Sessao::setSessao("teste@sessao.com");


print_r(Sessao::getSessao("usuario_logado"));
