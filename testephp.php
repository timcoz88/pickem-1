<?php
session_start();
require_once ("global.php");



print_r(Sessao::mostraSessao());


print_r(Sessao::usuarioLogado());


print_r(Sessao::usuarioEstaLogado());
