<?php
$path = dirname(__DIR__);
require_once $path."/database/_sql_connect.php";
$cx = cx_bench("mailtool");
if (verfy_tb("mailoldlist") == true && $_POST['mail'] != NULL) {
    $query = "SELECT * FROM mailoldlist WHERE mailAdress = :mailAdress";
    $stmt = $cx->prepare($query);
    $stmt->bindValue(":mailAdress",$_POST['mail']);
    $stmt->execute();
    $list = $stmt->fetch(PDO::FETCH_ASSOC);
    header("Location: ../app/list.php?mail=".$list['mailAdress']."&id=".$list['id']."");
} else {
    header("Location: ../app/list.php?mail=false");    
}
var_dump($list['id']);
var_dump($_POST['mail']);