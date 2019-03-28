<?php
  ini_set('display_errors',1);
  ini_set('display_startup_erros',1);
  error_reporting(E_ALL);

  include("class/reader.class.php");
  include("class/separator.class.php");
  include("class/validator.class.php");
  
  $leitor = new Reader();
  $lines = $leitor->read('assets/teste.csv'); //Executo a função que lê o arquivo CSV
  $separator = new Separator(); //Instancio o separador
  //var_dump($separator->getDomains($lines)); //Executo a função que pega apenas os domínios
  $domValid = ($separator->getValidDomains()); //Função que retorna a lsita de domínios válidos
  
 ?>
