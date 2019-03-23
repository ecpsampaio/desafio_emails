<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<?php
require './inc/bd.php';

try {
    $handle = @fopen("./desafio_emails/email_list.csv", "r");

    while (($e = fgets($handle, 4096)) !== false) {
        $email = str_replace("'","",$e);
        if(filter_var($email,FILTER_VALIDATE_EMAIL))
        {
            
            try {
                $query ="INSERT INTO EMAIL (email) VALUES('".$email."')";
                $rs = $mysqli->quuery($query);
                 
            } catch (Exception $ex) {
                print_r($ex);
                exit;
            }
        }
        else 
        {
            echo "EMAIL INVALIDO :$email<br>";
        }
        
    }
    fclose($handle);

} catch (Exception $ex) {
    print_r($ex);exit;
}
?>
<html>
    <head>
        
        <meta charset="UTF-8">
        <title>VALIDA DOR DE EMAILS</title>
    </head>
    <body>
        
        
    </body>
</html>
