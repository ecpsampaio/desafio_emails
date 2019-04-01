<?php
function ValidDomain($domain_mail,$domain_list) {
    if ($domain_mail->getDomain() == $domain_list->getDomain()) {
        $domain_mail->setStatus(true);
        $domain_mail->setPercent(100);
        $domain_mail->setSimilarDomain($domain_mail->getDomain()); 
    } else if($domain_mail->getStatus() == null){
        $domain_mail->setStatus(false);
        $domain_mail->setSimilarDomain("not found");
    }
}

?>