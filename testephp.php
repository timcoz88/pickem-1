<?php
session_start();
require_once 'class/Session.php';
//Session::setSessao("teste@sessao.com");


print_r(Session::getSessao("usuario_logado"));
