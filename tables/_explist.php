<?php

$path = dirname(__DIR__);
// conexão sql
require_once $path."/database/_sql_connect.php";
$cx = cx_bench("mailtool");
if (verfy_tb("exception") == true ) {
    $query = "SELECT * FROM exception";
    $stmt = $cx->prepare($query);
    $stmt->execute();
    $exception_list = $stmt->fetchALL(PDO::FETCH_ASSOC);
} else {
    $query = "CREATE TABLE exception (
        rule varchar(256) COLLATE utf8_bin NOT NULL,
        domainAdress varchar(256) COLLATE utf8_bin NOT NULL,
        PRIMARY KEY (domainAdress)
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;";
    $stmt = $cx->prepare($query);
    $stmt->execute();

    $query = "SELECT * FROM exception";
    $stmt = $cx->prepare($query);
    $stmt->execute();
    $exception_list = $stmt->fetchALL(PDO::FETCH_ASSOC);
}

?>