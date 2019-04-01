<?php
$path = dirname(__DIR__);
// conexão sql
require_once $path."/database/_sql_connect.php";
$cx = cx_bench("mailtool");
if (verfy_tb("mailcorrect") == true) {
    $query = "SELECT * FROM mailcorrect";
    $stmt = $cx->prepare($query);
    $stmt->execute();
    $mailcorrect_list = $stmt->fetchALL(PDO::FETCH_ASSOC);
} else {
    $query = "CREATE TABLE mailcorrect (
        index int(11) NOT NULL AUTO_INCREMENT,
        mailAdress varchar(256) COLLATE utf8_bin NOT NULL,
        region varchar(5) COLLATE utf8_bin NOT NULL,
        user varchar(256) COLLATE utf8_bin NOT NULL COMMENT 'Até antes do arroba',
        PRIMARY KEY (index)
      ) ENGINE=InnoDB AUTO_INCREMENT=8071 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
      ";
    $sql_mailcorrect = $cx->prepare($query);
    
    // verificação de uso
    $sql_mailcorrect->execute();

    $query = "SELECT * FROM mailcorrect";
    $sql_mailcorrect = $cx->prepare($query);
    
    // verificação de uso
    $sql_mailcorrect->execute();
    
    // array de valores
    $mailcorrect_list = $sql_mailcorrect->fetchALL(PDO::FETCH_ASSOC);
} 
?>