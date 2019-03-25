<?php

$dir_up = "data/";

$file = $_FILES['listaEmail'];

if ($file['error'] == 0) {
    /* $extensao = strtolower(end(explode('.', $file['name'])));
      if ($extensao != 'csv') {
      echo "Por favor, envie arquivos com as seguintes extensões: CSV ";
      exit;
      }
     * 
     */
    if (move_uploaded_file($file['tmp_name'], $dir_up . $file['name'])) {
        // Upload efetuado com sucesso, exibe uma mensagem e um link para o arquivo
        echo "Upload efetuado com sucesso! <br>  Iniciando Validação do Arquivo" . $file['name'] . "<br>";
        require './inc/functions.php';
        require './inc/bd.php';
        $handle_email = @fopen($dir_up . $file['name'], "r");
       
        //$mysqli->query('TRUNCATE TABLE EMAIL');
       
        $stm = $mysqli->query("select dominio from dominios");
        while ($rs = $stm->fetch_array(MYSQLI_ASSOC)) {
            $domain[] = trim($rs['dominio']);
        }
        $stm->close();
         
    
        while (!feof($handle_email) && ($line = fgets($handle_email)) !== false) {
            $ret = validarEmail(trim(str_replace("'", "", $line)), $domain);

            if ($ret['erro'] == 0) {
                $query = "INSERT INTO EMAIL (EMAIL,ERRO,EMAIL_CORRIGIDO) VALUES('" . $line . "',0,NULL)";
            } else {
                $query = "INSERT INTO EMAIL (EMAIL,ERRO,EMAIL_CORRIGIDO) VALUES('" . $line . "',1,'" . $ret['email_validado'] . "')";
                //print_r($query);exit;
            }
            if(!$mysqli->query($query))
            {
                print_r($query);exit;
            }
        }

        $mysqli->close();
        header("Location: index.php?get=relEmail");
    } else {
        // Não foi possível fazer o upload, provavelmente a pasta está incorreta
        echo "Não foi possível enviar o arquivo, tente novamente";
    }
} else {
    var_dump($_FILES);
}
