<?php
    require_once("validator.class.php");

    class Report {
        //Email = Nome + @ + Domínio
        /**
         * Retorna a quantidade de cada domínio inválido para geração de gráficos
         */
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
        /**
         * Retorna a quantidade de nome inválido para geração de gráfico
         */
        public function getDuplicateEmailsReport(){
            $reader = new Reader();
            $lines = $reader->read(LIST_EMAILS);
            $emailsCount = array_count_values($lines);
            $repeateds = array(); 
            foreach ($emailsCount as $email => $quantidade) {
                if($quantidade > 1){
                    $repeateds[] = array($quantidade => $email);
                }
            }
            return $repeateds;
        }
    }

?>