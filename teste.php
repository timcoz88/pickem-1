<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE );
session_start();
require_once ("global.php");

echo "<pre>";
try {
    $resultados = resultadoDao::classificacao();
} catch (Exception $e) {
    Erro::trataErro($e);
}
try {
    $metcon = metconDao::listar();
} catch (Exception $e) {
    Erro::trataErro($e);
}

print_r($resultados);

foreach ($resultados as &$resultado) {
    
$i = 1;
    echo "<br/>";
			echo $i." ";
			echo $resultado['nomeUsuario']." ".$resultado['sobrenomeUsuario']." ";
			echo "TOTAL ";
			foreach ($metcon as $wod) {
			    if (!defined($resultado[$wod['idMetcon']])) {
                    echo $resultado[$wod['idMetcon']]." ";
			    } else {
			        echo 0;
			    }
			}
			$i++;
			echo "<br/>";
			echo $i;

}
    echo "</pre>";
