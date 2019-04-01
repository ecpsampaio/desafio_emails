<?php

function ErrorDomain($mail,$domain,$error,$except) {
    $before = 0;
    if ($mail->getStatus() == false) { // se o estatus for falso:
        if (strlen($mail->getDomain()) < 3) { // em casos onde temos endereço de email com poucos caracteres
            $mail->setSimilarDomain(false);
        } else {
            if ($mail->getDomain() == $except->getrule()) {
                $mail->setSimilarDomain($except->getdomainadress());
                $except->setquant();
            } else {
                similar_text($mail->getDomain(),$domain->getDomain(),$before);
                if($before == $mail->getPercent() && $before != 0) { // caso onde há duas possibilidades distintas de semelhança
                    foreach ($error as $error_value) {
                        if (strcmp($mail->getSimilarDomain(),$error_value) == 0 || strcmp($domain->getDomain(),$error_value) == 0) {
                            $mail->setSimilarDomain($error_value);
                        }
                    }
                } else if ($before > $mail->getPercent() && $mail->getStatus() == false) { // detecta qual tem a maior porcentagem
                    $mail->setPercent($before);
                    $mail->setSimilarDomain($domain->getDomain());
                }
            }
        }            
    }
}
?>