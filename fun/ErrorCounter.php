<?php
function RegionCounter($mail,$region) {
    foreach ($region as $region_list) {
        // contabiliza os casos totais
        if (strcmp($mail->getRegion(),$region_list->getRegion()) == 0) {
            $region_list->setTotalCount();
        }
        // contabiliza os casos de erro
        if ($mail->getStatus() == false){
            if (strcmp($mail->getRegion(),$region_list->getRegion()) == 0) {
                $region_list->setErrorCount();
            } 
        } 
        // contabiliza os casos corretos
        else if ($mail->getStatus() == true){
            if (strcmp($mail->getRegion(),$region_list->getRegion()) == 0) {
                $region_list->setCorrectCount();
            } 
        }
    }
}

function ErorDomainCounter($mail,$domain) {
    foreach ($domain as $domain_list) {
        if (strcmp($mail->getSimilarDomain(),$domain_list->getDomain()) == 0) {
            $domain_list->setTotalQuant();
        }
        if ($mail->getStatus() == false){
            if (strcmp($mail->getSimilarDomain(),$domain_list->getDomain()) == 0) {
                $domain_list->setErrorQuant();
            } 
        } else if ($mail->getStatus() == true){
            if (strcmp($mail->getSimilarDomain(),$domain_list->getDomain()) == 0) {
                $domain_list->setCorrectQuant();
            } 
        }
    }
}

function CasesCount($mail,$error_list) {
    if ($mail->getStatus() == false) {
        foreach ($error_list as  $case_error) {
            if (strcmp($mail->getDomain(),$case_error->getCase()) == 0) {
                $case_error->setErrorCount();
            }
        }
    }    
}
?>