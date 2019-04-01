<?php

  class Reader {

    private $file = '';

    public function file_get_contents_chunked($file,$chunk_size,$callback)
    {
        try
        {
            $handle = fopen($file, "r");
            $i = 0;
            while (!feof($handle))
            {
                call_user_func_array($callback,array(fread($handle,$chunk_size),&$handle,$i));
                $i++;
            }

            fclose($handle);

        }
        catch(Exception $e)
        {
            trigger_error("file_get_contents_chunked::" . $e->getMessage(),E_USER_NOTICE);
            return false;
        }

        return true;
    }


    /*public function read($caminhoArquivo){ //A função READ recebe o caminho do arquivo que vai abrir
      $file = fopen(LIST_EMAILS, "r"); //Abre o arquivo para leitura
      $lines = array(); //guardo as linhas do arquivo
      while(!feof($file)){ //Enquanto não estiver chegado no fim do arquivo
        $lines[] = str_replace("'","",fgetcsv($file, 4096, "\n")[0]); //Pego as linhas do arquivo usando '\n' como delimitador e guardo isso em linha #----#Se eu não usar o delimitador funciona do mesmo jeito
      }
      fclose($file);
      return $lines;
    }*/

    public function read($caminhoArquivo){
      $success = $this->file_get_contents_chunked($caminhoArquivo,4096,function($chunk,&$handle,$iteration) {
                    $this->file .= str_replace(['\'', "\r"], '', $chunk);
                 });
      $this->file = explode("\n", $this->file);
      return $this->file;
    }
        
  }
 ?>