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
        public function getDuplicatedEmailsReport(){
            $reader = new Reader();
            $lines = $reader->read(LIST_EMAILS);
            $emailsDuplicateCount = array_count_values($lines);
            foreach ($emailsDuplicateCount as $email => $quantidade) {
                if($quantidade == 1){
                    unset($emailsDuplicateCount[$email]);
                }
            }
            return $emailsDuplicateCount;
        }

        public function getHighestOccurrenceReport(){
            $reader = new Reader();
            $lines = $reader->read(LIST_EMAILS);
            $separator = new Separator();
            $domains = $separator->getDomains($lines); 
            $validDomains = $separator->getValidDomains(); 
            $validator = new Validator();
            $invalidDomains = $validator->getInvalidDomains($domains,$validDomains); //Pego Domínios Inválidos
            $data = array_count_values($invalidDomains);
            $heighestOccurrence = 0;
            $heighestOccurrenceEmail = "";
            foreach($data as $key => $value){
                if($value > $heighestOccurrence){
                    $heighestOccurrence = $value;
                    $heighestOccurrenceEmail = $key;
                }
            }
            return [$heighestOccurrence,$heighestOccurrenceEmail];
        }

        public function getLessOccurrenceReport(){
            $reader = new Reader();
            $lines = $reader->read(LIST_EMAILS);
            $separator = new Separator();
            $domains = $separator->getDomains($lines); //Pego Domínios
            $validDomains = $separator->getValidDomains(); //Pego domínios Válidos
            $validator = new Validator();
            $invalidDomains = $validator->getInvalidDomains($domains,$validDomains); //Pego Domínios Inválidos
            $data = array_count_values($invalidDomains);
            $lessOccurrence = 999999;
            $lessOccurrenceEmail = "";
            foreach($data as $key => $value){
                if($value < $lessOccurrence){
                    $lessOccurrence = $value;
                    $lessOccurrenceEmail = $key;
                }
            }
            return [$lessOccurrence,$lessOccurrenceEmail];
        }

        public function getCountInvalidEmailsReport(){
            $reader = new Reader();
            $lines = $reader->read(LIST_EMAILS);
            $separator = new Separator();
            $domains = $separator->getDomains($lines); //Pego Domínios
            $validDomains = $separator->getValidDomains(); //Pego domínios Válidos
            $validator = new Validator();
            $invalidDomains = $validator->getInvalidDomains($domains,$validDomains); //Pego Domínios Inválidos
            $countInvalidDomains = count($invalidDomains);
            return $countInvalidDomains;
        }

    }

?>