<?php
function WhereErrorDomain($value) {
    if ($value->getStatus() == 0) {
        if (strlen($value->getDomain()) < strlen($value->getSimilarDomain())) {
            $limit = strlen($value->getDomain());
        } else if($value->getSimilarDomain() == false) {
            $value->seStatus("not possible");
        } else {
            $limit = strlen($value->getSimilarDomain());
        }
        for ($i = 0;  $i < $limit; $i++) {
            if ($i > 1 && strcmp(substr($value->getDomain(),0,$i),substr($value->getSimilarDomain(),0,$i)) != 0) {
                $value->setErrorDomain(substr($value->getDomain(),0,$i));
                break;
            }
        }
    } else {
        $value->setErrorDomain(false);
    }
}
?>