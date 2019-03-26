<?php
  ini_set('display_errors',1);
  ini_set('display_startup_erros',1);
  error_reporting(E_ALL);

  $file = fopen("teste.csv", "r");
  $arrayGerado[] = array();
  while(!feof($file)){ //Enquanto não estiver no fim do arquivo percorra ele
    $arrayGerado[] = fgetcsv($file); //Gere um array com as linhas do arquivo
  }
  fclose($file); //Fecha o arquivo

  foreach ($arrayGerado as $key => $value) { //Percorro o array gerado com os emails
    foreach ($value as $k => $v) { //O retorno é um array, então percorro e pego os emails
      $emailQuebrado = explode('@', $v); //Apos ter os emails quebro eles em 2 usando @ como delimitador
      foreach ($emailQuebrado as $indice => $email) { //Percorro o array $emailQuebrado
        if($indice == 1){ //Pego apenas o índice 1, pois é equivalente a parte do domínio
          echo $email; //exibo os domínios
          echo "<br>";
        }
      }
    }
  }

?>
