<?php
$path = dirname(__DIR__);
require_once $path."/database/_sql_connect.php";


?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SearchMail - Lista de prioridade</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php
    require_once $path."/config/allfront.php";
    ?>
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <script src="main.js"></script>
</head>
<body>
<?php require_once $path."/config/navbar.php"; ?>
    <table>
    <caption>Tabela dos dôminios</caption>
    <tr>
        <th>Regras</th>
        <th>Domínio</th>
        <th>Opções</th>
    </tr>
<?php
if (verfy_tb("domainlist") != false) {
    $cx = cx_bench("mailtool");
    $query = "SELECT * FROM exception";
    $stmt = $cx->prepare($query);
    $stmt->execute();
    $list = $stmt->fetchAll(PDO::FETCH_ASSOC);
} 
// var_dump($list);
$list = array_reverse($list);

foreach ($list as $value) {
    echo '<tr>';
    echo "<td>".$value['rule']."</td>";
    echo "<td>".$value['domainAdress']."</td>";
    echo '<td>
    <a href = "../fun/dropRule.php?domain='.$value['domainAdress'].'">Deletar</a>
    </td>';
    echo '</tr>';
}
?>
    </table>
    <form method="POST" action="../fun/addRule.php">
        <input type="text" name="newRule" required placeholder="digite a ocorrência a ser detectada">    
        <input type="text" name="newDomain" required placeholder="digite apenas o domínio: example.com">
        <input type="submit" placeholder = "Enviar"value="Enviar">
    </form>
</body>
</html>
