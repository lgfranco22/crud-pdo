<?php
    $dsn = "mysql:dbname=nome_da_base_de_dados;host=nome_do_host";
    $dbuser = "usuario";
    $dbpass = "senha";

    try{
        $pdo = new PDO($dsn,$dbuser,$dbpass);
        //echo "Conectado";
    } catch(PDOException $e) {
        echo "Falhou: ".$e->getMessage();
    }
  
?>
