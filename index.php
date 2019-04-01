<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Serachmail Carregando...</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <!-- jquerry offline server side -->
    <!-- <script src = "./jQuerry/jQuerry.js";> -->
    <!-- jquerry google -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="main.js"></script>
</head>
<body>
    <h1>Carregando... Em breve você será redirecionado</h1>
</body>
</html>
<?php
    require_once "./database/_sql_connect.php";
    // cria a tabela caso a mesma n exista
    $cx = cx_bench("mailtool");
    $query = "CREATE DATABASE IF NOT EXISTS mailtool";
    $stmt = $cx->prepare($query);
    $stmt->execute();

    $query = "CREATE TABLE IF NOT EXISTS mailcorrect (
        id INT(5) AUTO_INCREMENT PRIMARY KEY,
        mailAdress varchar(256) COLLATE utf8_bin NOT NULL,
        region varchar(5) COLLATE utf8_bin NOT NULL,
        user varchar(256) COLLATE utf8_bin NOT NULL
      ) ENGINE=InnoDB AUTO_INCREMENT=8071 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
      ";
    $stmt = $cx->prepare($query);
    $stmt->execute();

    $query = "CREATE TABLE IF NOT EXISTS domainlist (
        domainAdress varchar(256) COLLATE utf8_bin NOT NULL PRIMARY KEY COMMENT 'endereço completo'
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;";
    $stmt = $cx->prepare($query);
    $stmt->execute();

    $preloader_domain = ["gmail.com","hotmail.com","hotmail.com.br","hotmail.com.ar","hotmail.com.mx","msn.com"];

    $query = "SELECT COUNT(*) FROM domainlist";
    $stmt = $cx->prepare($query);
    $stmt->execute();
    if ($stmt->fetch(PDO::FETCH_ASSOC) <= 0) {
      foreach ($preloader_domain as $value) {
        $stmt = $cx->prepare($query);
        $query = "INSERT INTO domainlist (domainAdress) VALUES (:domainAdress);";
        $stmt->bindValue(":domainAdress",$value);
        $stmt->execute();
      }
    }

    $query = "CREATE TABLE IF NOT EXISTS exception (
        rule varchar(256) COLLATE utf8_bin NOT NULL PRIMARY KEY,
        domainAdress varchar(256) COLLATE utf8_bin NOT NULL
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;";
    $stmt = $cx->prepare($query);
    $stmt->execute();

    $query = "CREATE TABLE IF NOT EXISTS mailoldlist (
        id int(11) AUTO_INCREMENT PRIMARY KEY,
        mailAdress varchar(256) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL 
      ) ENGINE=InnoDB AUTO_INCREMENT=101270 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;";
    $stmt = $cx->prepare($query);
    $stmt->execute();

    // carrega os email's corrigidos em uma tabela sql
    header("location: ./app/Menu.php");
?>
