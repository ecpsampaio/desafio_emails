<?php

  class Reader {

    public function read($caminhoArquivo){ //A função READ recebe o caminho do arquivo que vai abrir
      $file = fopen($caminhoArquivo, "r"); //Abre o arquivo para leitura
      $lines = array();
      while(!feof($file)){ //Enquanto não estiver chegado no fim do arquivo
        $lines[] = fgetcsv($file, "\n"); //Pego as linhas do arquivo usando '\n' como delimitador e guardo isso em linha #----#Se eu não usar o delimitador funciona do mesmo jeito
      }
      fclose($file);
      return $lines;
    }
  }
 ?>