<?php
$path = dirname(__DIR__);
require_once $path."/database/_sql_connect.php";
$cx = cx_bench("mailtool");
if (verfy_tb("testi") == true && $_POST['mail'] != NULL) {
    $query = "INSERT INTO testi
    (mail)
    VALUES
    (:mail);
    ";
    $stmt = $cx->prepare($query);
    $stmt->bindValue(":mail",$_POST['mail']);
    $stmt->execute();
} else {
    echo "fail";
}