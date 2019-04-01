<!-- pego os valores com get e inicio a função e deleto o banco depois passo o array e remonto o banco -->

<?php
$path = dirname(__DIR__);
require_once $path."/fun/modfyPriority.php";
require_once $path."/database/_sql_connect.php";

if (verfy_tb("domainlist") != false) {
    $cx = cx_bench("mailtool");
    $query = "SELECT * FROM domainlist";
    $stmt = $cx->prepare($query);
    $stmt->execute();
    $list = $stmt->fetchAll(PDO::FETCH_ASSOC);
} 
foreach ($list as $value) {
    $arrteste[] = $value['domainAdress'];
}
$arrteste = addOne($arrteste,$_GET['value']);
echo "<br>";
if ($arrteste == false) {
    echo "mudança inválida";
} else {
    echo "mudança válida<br>";
    var_dump($arrteste);
    $query = "DELETE fROM domainlist WHERE 0 = 0";
    $stmt = $cx->prepare($query);
    $stmt->execute();

    foreach ($arrteste as $value) {
        if (substr($value,0,-3) == "com") {
            $reg = "com";
        } else {
            $reg = substr($value,0,-2);
        }
        $query = "INSERT INTO domainlist (domainAdress) VALUES (:domainAdress)";
        $stmt = $cx->prepare($query);
        $stmt->bindValue(":domainAdress",$value);
        $stmt->execute();
    }

    header("Location: ../app/domain.php");
}
?>