<?php

//require './inc/bd.php';



function validarEmail($e,$domain) {

 
            
 
    $email = explode("@", $e);
    
    if (!in_array($email[1], $domain)) 
    {


        $e_invalido = explode(".", $email[1]);
        $v = ["P" => 0, "C" => 0];
        foreach ($domain as $i => $d) {
        //print_r($d);exit;
            $d_ = explode(".", $d);

            if (count($e_invalido) == count($d_) and $d_[count($e_invalido) - 1] == $e_invalido[count($e_invalido) - 1]) {

                if ($v["C"] < similar_text($e_invalido[0], $d_[0])) {
                    $v["C"] = similar_text($e_invalido[0], $d_[0]);
                    $v["P"] = $i;
                }
            }
            else 
            {
                
            }
        }
        $e_valido = $email[0] . "@" . $domain[$v["P"]];
        //echo "ESTE E-MAIL " . $email[1] . " É <B>INVALIDO</B> <br>";
        //echo "E-MAIL CORRIGIDO " . $e_valido . " É <B>INVALIDO</B> <br>";
        return array("erro" => 1, "msg" => 'EMAIL CORRIGIDO',"email_enviado"=>$e ,"email_validado" => $e_valido);
    } else {
        return array("erro" => 0, "msg" => 'EMAIL VALIDO');
    }
    
}
