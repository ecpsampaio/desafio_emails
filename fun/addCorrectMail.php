<?php
if (isset($_POST['mail']) == false) {
    header("Location: ../app/teste.php?task=false");
}
// database connection
$path = dirname(__DIR__);
include_once $path."/database/_sql_connect.php";
include_once $path."/tables/_domainList.php";
include_once $path."/tables/_mailoldlist.php";
include_once $path."/tables/_correctmails.php";
include_once $path."/tables/_explist.php";

// funções
require_once $path."/fun/ValidDomain.php";
require_once $path."/fun/ErrorDomain.php";
require_once $path."/fun/ErrorCounter.php";
require_once $path."/fun/WhereErrorDomain.php";

//classes
require_once $path."/_class/_Mails.php";
require_once $path."/_class/_Domain.php";
require_once $path."/_class/_Region.php";
require_once $path."/_class/_ErrorCase.php";
require_once $path."/_class/_Exceptions.php";

// carregadores
require_once $path."/fun/carryCorrectCases.php";

// lista de dominio
    // teste
    // $doms = array("gmail.com","hotmail.com","hotmail.com.br","hotmail.com.mx","hotmail.com.ar","msn.com");
    // banco de dados
    foreach ($list_domainoldlist as $value) {
        $doms[] = $value["domainAdress"];
    }
    // lista de prioridade em caso de semelhança
    // $priority_list = array("msn.com","hotmail.com.br","hotmail.com.mx","hotmail.com.ar","hotmail.com","gmail.com");
    $priority_list = array_reverse($doms);
// carregando dominios e regiões como objeto
foreach ($doms as $value) {
    $domain_obj[] = new _Domain($value);
}

// carregando as regioes em um array
foreach ($domain_obj as $value) {
    $AllRegions[] = $value->getRegion();
}
// array de regiões
$reg = array_unique($AllRegions); // array de regiões sem repetição

// criando objeto contendo as possíveis regios
foreach ($reg as $value) {
    $region[] = new _Region($value);   
}

// exceções
foreach ($exception_list as $exp) {
    $except[] = new _Exceptions($exp['domainAdress'],$exp['rule']);
}

$mail = new _Mails($_POST['mail']);

foreach ($domain_obj as $domain) { // passagen de objeto dominio
    ValidDomain($mail,$domain); // valida os dominios
}

foreach ($domain_obj as $domain) { // passagen de objeto dominio
    foreach ($except as $exp_list) {
        ErrorDomain($mail,$domain,$priority_list,$exp_list); // função de análise de erros
    }
}

$query = "INSERT INTO mailcorrect (mailAdress,region,user)
VALUES (:mailAdress,:region,:user);";

if (verfy_tb('mailcorrect') != false) {
    $cx = cx_bench("mailtool");
    $stmt = $cx->prepare($query);
    $stmt->bindValue(":mailAdress",$mail->getSimilarDomain());
    $stmt->bindValue(":region",$mail->getRegion());
    $stmt->bindValue(":user",$mail->getUser());
    $stmt->execute();
    header("Location: ../app/teste.php?task=valid");
}
?>