<?php

set_time_limit(0); // Limite de tempo de execução: Deixe 0 (zero) para sem limite
ignore_user_abort( true ); // Não encerra o processamento em caso de perda de conexão

$path = dirname(__DIR__);
require_once $path."../../database/_sql_connect.php";

// header que gera cvs
header('Content-type: application/ms-excel');
header('Content-Disposition: attachment; filename=sample.csv');

$cx = cx_bench("mailtool");

include_once "../../config/tratament.php";

include_once "../../fun/carryCorrectCases.php";

if (verfy_tb("mailcorrect") === true) { // verifica se a tabela exite
    LoadCorrectMails($mail_obj,$cx);
}

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

    // query sql tabela final
    $query = "SELECT * FROM mailcorrect";
    $sql_mailcorrect = $cx->prepare($query);
    
    // verificação de uso
    $sql_mailcorrect->execute();
    
    // array de valores
    $mailcorrect_list = $sql_mailcorrect->fetchALL(PDO::FETCH_ASSOC);
}

$html = null;

foreach ($mailcorrect_list as $value) {
    if ($value['user'] != null || $value['user'] != "") {
        $html .= $value['user']."@".$value['mailAdress']."\n";
    }
}

echo $html;
?>