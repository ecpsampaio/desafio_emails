<?php
    require_once("reader.class.php");
    require_once("separator.class.php");
     require_once("validator.class.php");
    /**
     * Classe responsável por corrigir os emails inválidos
     */
    class Corrector{

        /**
         * Função que corrige os emails inválidos
         * @param invaldEmails: Emails invaldios gerados em Validator->getInvalidDomains
         */
        public function correct($invaldEmails){
            $separator = new Separator();
            $validDomains = $separator->getValidDomains();
            $correctdEmails = array();
            foreach($invaldEmails as $key=> $email){ //retorno os emails invalidos
                $smallerDifference = 99999; //Pego a menor diferença dentro de cada loop
                foreach($validDomains as  $domain){ //retorno apenas dominos validos
                    //$smallerDifference = 99999;
                    $d = Separator::getDomain($email); //Retorno o dominio do email inválido para posterior comparação e correção
                    if(strpos($domain, $d)){ //Checa se tem ocorrência de pedaço de dominio naquele email 
                        $diff = strlen($domain) - strlen($d); //Calculo a diferença entre o dominio e o pedaço de dominio
                        if($diff < $smallerDifference){ //Se diferença for menor que menor diferença
                            
                            //$d = $domain; //Troco o $d = $domain; //Troco o Domínio
                            $email = str_replace($d, $domain, $email);
                            $smallerDifference = $diff; //Atualizo o valor de menor diferença para a menor diferença encontrada
                            $correctdEmails[] = $email;
                        }
                    } 
                }
            }
            return $correctdEmails;
        }
    }
?>