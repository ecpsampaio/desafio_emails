<?php
require './inc/bd.php';
$query = "select count(id) TOTAL, 
case erro 
when  0 then 'EMAIL_VALIDO' 
when  1 then 'EMAIL_INVALIDO'  
END TIPO 
from email 
GROUP BY ERRO
ORDER BY ERRO";

$stm = $mysqli->query($query);
$data = $stm->fetch_all(MYSQLI_ASSOC);
 
$stm->close();
?>


<div class="col-md-12">
    <h1>RELATORIO</h1>
    <table class="table">
        <thead class="table-bordered">
    <tr>
      
      <th scope="col">TOTAL</th>
      <th scope="col">TIPOS DE EMAIL</th>
      
    </tr>
  </thead>
  <tbody>
    <?php
    $T =0;
    foreach ($data as $d):
        $T += $d['TOTAL'];
    ?>
      <tr class="table-bordered">
          
          <td>
              <?=$d['TOTAL']?>
          </td>
              <td>
              <?=$d['TIPO']?>
          </td>
      
      </tr>
    
    <?php
 endforeach;
 ?>
       <tr class="table-primary">
          <td class="alert-danger h4">EMAILS APURADOS</td>
          <td class="alert-danger h4">
              <?=$T?>
          </td>
      
      </tr>
  </tbody>
    </table>
</div>


