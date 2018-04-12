<?php
require_once ("global.php");

$h = $_GET['h'];

if(!empty($h)) {
    
    usuarioDao::ativaUsuario($h);
    
}