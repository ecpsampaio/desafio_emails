<?php
require './bd.php';
require './functions.php';

$email  = $_REQUEST['email'];
if($email)
{
     $stm = $mysqli->query("select dominio from dominios");
        while ($rs = $stm->fetch_array(MYSQLI_ASSOC)) {
            $domain[] = trim($rs['dominio']);
        }
        $stm->close();
     
            $ret = validarEmail(trim($email), $domain);

            if ($ret['erro'] == 0) {
                $query = "INSERT INTO EMAIL (EMAIL,ERRO,EMAIL_CORRIGIDO) VALUES('" . $email . "',0,NULL)";
            } else {
                $query = "INSERT INTO EMAIL (EMAIL,ERRO,EMAIL_CORRIGIDO) VALUES('" . $email . "',1,'" . $ret['email_validado'] . "')";
                //print_r($query);exit;
            }
            if(!$mysqli->query($query))
            {
                print_r($query);exit;
            }
            
            echo json_encode($ret);
        $mysqli->close();
        
}

