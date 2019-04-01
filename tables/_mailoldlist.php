<?php
$path = dirname(__DIR__);
// requisiçao pdo mysql
require_once $path."/database/_sql_connect.php";
$cx = cx_bench("mailtool");

if (verfy_tb("mailoldlist") == true) {
    // querry
    $query = "SELECT * FROM mailoldlist";
    $sql_mailoldlist = $cx->prepare($query);
    
    // verificação de uso
    $sql_mailoldlist->execute();
    
    // array de valores
    $list_mailoldlist = $sql_mailoldlist->fetchALL(PDO::FETCH_ASSOC);
} else {
    $query = "CREATE TABLE mailoldlist (
        index int(11) NOT NULL AUTO_INCREMENT,
        mailAdress varchar(256) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL ,
        PRIMARY KEY (`index`)
      ) ENGINE=InnoDB AUTO_INCREMENT=101270 DEFAULT CHARSET=utf8 COLLATE=utf8_bin";

    $sql_mailoldlist = $cx->prepare($query);
        
    // verificação de uso
    $sql_mailoldlist->execute();

    $query = "SELECT * FROM mailoldlist";
    $sql_mailoldlist = $cx->prepare($query);
    
    // verificação de uso
    $sql_mailoldlist->execute();
    
    // array de valores
    $list_mailoldlist = $sql_mailoldlist->fetchALL(PDO::FETCH_ASSOC);
}
?>
