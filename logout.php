<?php
session_start();
require_once("class/Session.php");


Session::logout();
Session::setSessao("success", "Deslogado com sucesso.");
header("Location: index.php");
die();
