<?php

class Connection
{

    public static function getConnection()
    {
        $dsn = "mysql:dbname=CFPickEM;host=localhost";
        $dbuser = "root";
        $dbpass = "root";

        
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