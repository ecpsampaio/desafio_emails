<?php
$path = dirname(__DIR__);
require_once $path."/database/_sql_connect.php";
$cx = cx_bench("mailtool");
if (verfy_tb("domainlist") == true && $_GET['domain'] != NULL) {
    $query = "DELETE FROM domainlist WHERE domainAdress = :domainAdress";
    $stmt = $cx->prepare($query);
    $stmt->bindValue(":domainAdress",$_GET['domain']);
    $stmt->execute();
    header("Location: ../app/domain.php?task=valid");
} else {
    header("Location: ../app/domain.php?task=false");    
}