<?php

class Connection
{

    public static function getConnection()
    {
        $dsn = "mysql:dbname=madem561_CFPickEM;host=br112.hostgator.com.br";
        $dbuser = "madem561_madeRT";
        $dbpass = "1MAD4jk6_";

        
        try {
            
            $conexao = new PDO($dsn, $dbuser, $dbpass);
            $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Conectado com Sucesso";
           
            return $conexao;
            
        } catch (PDOException $e) {
            
            echo "Falhou: " . $e->getMessage(); 
        }
    }
}