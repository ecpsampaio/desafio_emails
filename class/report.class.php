<?php
    require_once("validator.class.php");

    class Report {

        public function getInvalidsDomainsReport(){
            $reader = new Reader();
            $lines = $reader->read(LIST_EMAILS);
            $separator = new Separator();
            $domains = $separator->getDomains($lines); //Pego Domínios
            $validDomains = $separator->getValidDomains(); //Pego domínios Válidos
            $validator = new Validator();
            $invalidDomains = $validator->getInvalidDomains($domains,$validDomains); //Pego Domínios Inválidos
            $data = array_count_values($invalidDomains);
            return $data;
        }
    }

?>