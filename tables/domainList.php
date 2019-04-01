<?php
$path = dirname(__DIR__);
$localpath = dirname(__FILE__);
// motagen da lista de dominios
include_once $localpath."/_domainList.php";

// construindo front-end (tabela)
if ($list_domainoldlist == null) {
    echo  "<span>tabela vazia</span>";
} else {
?>
<table>
<caption>Old domainList</caption>
<tr>
    <th>index</th>
    <th>domaim adress</th>
</tr>
<?php
    foreach ($list_domainoldlist as $value):
?>
<tr>
    <td><?php echo $value['index'];?></td>
    <td><?php echo $value['domainAdress'];?></td>
</tr>
<?php
    endforeach;
}
?>
</table>