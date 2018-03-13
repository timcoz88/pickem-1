<?php
session_start();
require_once ("global.php");


Sessao::logout();
session_start();
Sessao::setSessao("success", "Deslogado com sucesso.");

header("Location: index.php");
die();
