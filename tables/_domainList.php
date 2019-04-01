<?php
$path = dirname(__DIR__);
// requisiçao pdo mysql
require_once $path."/database/_sql_connect.php";
$cx = cx_bench("mailtool");

if (verfy_tb("domainlist") == true) {
    // querry
    $query = "SELECT * FROM domainlist";
    $sql_domainoldlist = $cx->prepare($query);
    
    // verificação de uso
    $sql_domainoldlist->execute();
    
    // array de valores
    $list_domainoldlist = $sql_domainoldlist->fetchALL(PDO::FETCH_ASSOC);
} else {
    $query = "CREATE TABLE domainlist (
        'domainAdress' varchar(256) COLLATE utf8_bin NOT NULL COMMENT 'endereço completo'
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin";
    $sql_domainoldlist = $cx->prepare($query);
    
    // verificação de uso
    $sql_domainoldlist->execute();

    $query = "SELECT * FROM domainlist";
    $sql_domainoldlist = $cx->prepare($query);
    
    // verificação de uso
    $sql_domainoldlist->execute();
    
    // array de valores
    $list_domainoldlist = $sql_domainoldlist->fetchALL(PDO::FETCH_ASSOC);  
}
?>
