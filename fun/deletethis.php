<?php
$path = dirname(__DIR__);
require_once $path."/database/_sql_connect.php";
var_dump($_GET['id']);
$cx = cx_bench("mailtool");
if (verfy_tb("mailoldlist") == true && $_GET['id'] != NULL) {
    $id = $_GET['id'];
    $query = "DELETE FROM mailoldlist WHERE id = ".$id.";";
    $stmt = $cx->prepare($query);
    $stmt->execute();
    header("Location: ../app/list.php?task=valid");
} else {
    header("Location: ../app/list.php?task=false");    
}
?>