<?php

require_once 'class/config.php';

spl_autoload_register('carregarClasse');

function carregarClasse($nomeClasse)
{
    if (file_exists('class/' . $nomeClasse . '.php')) {
        require_once 'class/' .$nomeClasse . '.php';
    }
}