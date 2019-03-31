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
         */
        public function correct($invaldEmails){
            $separator = new Separator();
            $validDomains = $separator->getValidDomains();
            $smallerDifference = 99999;
            foreach($invaldEmails as $email){ //retorno os emails invalidos
                foreach($validDomains as  $domain){ //retorno apenas dominos validos
                    $d = Separator::getDomain($email); //Retorno o dominio de um dado e-mail
                    if(strpos($domain, $d)){ //Checa se tem ocorrência de pedaço de dominio naquele email 
                        $diff = strlen($domain) - strlen($d); //Calculo a diferença entre o dominio e o pedaço de dominio
                        if($diff < $smallerDifference){ //Se diferença for menor que menor diferença
                            echo "<h4>O valor do D era: $d</h4>";
                            $d = $domain;
                            echo "<h4> Valor de D  agora é = $d</h4>";
                            $smallerDifference = $diff;
                        }
                        echo $domain . ' -> ' . $d . ' diff= ' . $diff.'<br>';
                        echo "A menor diferença agora é: $smallerDifference <br><br>";
                    }
                    echo "Fim do loop para checagem de $d em $domain <br>";
                }
            }
        }
    }
?>