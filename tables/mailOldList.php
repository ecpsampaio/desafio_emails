<?php
$path = dirname(__DIR__);
$localpath = dirname(__FILE__);

// requisiçao pdo mysql
include_once $localpath."/_mailoldlist.php";

if ($list_mailoldlist == null) {
    echo  "<span>tabela vazia</span>";
} else {
?>
<table>
<caption>Old mail</caption>
<tr>
    <th>index</th>
    <th>mail adress</th>
</tr>
<?php
    foreach ($list_mailoldlist as $value):
?>
<tr>
    <td><?php echo $value['index'];?></td>
    <td><?php echo $value['mailAdress'];?></td>
</tr>
<?php
    endforeach;
}
?>
</table>