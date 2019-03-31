<?php
    require_once("reader.class.php");
    require_once("separator.class.php");

    /**
     * É a classe que compara e separa os emails válidos
     */
    class Validator{
        
        /**
         * @param domains: Lista de domínios de um arquivo
         * @param validDomains: Lista de domínios válidos
         * Pega os domínios válidos, a lista de emails e retorna os domínios inválidos
         */
        public function getInvalidDomains($domains, $validDomains){
            $leitor = new Reader(); //Instancio o leitor
            $lines = $leitor->read("assets/teste.csv"); //Passo o caminho do arquivo a ser lido
            $separator = new Separator(); //Instancio o separador
            $domains = $separator->getDomains($lines); //Passo as linhas do arquivo aberto como parâmetro ao separador e ele me retorna os domínios
            $invalidDomains = array();
            foreach ($domains as $domain) {
                if(!($this->isValidDomain($domain))){ //Checa se os dominios são válidos
                    $invalidDomains[] = $domain; //Se não forem os salva em invalidDomain
                }
            }
            return $invalidDomains; //Retorna os domínios inválidos
        } 

        /**
         * @param $domain: Dominios de emails de um arquivo lido
         * Função privada da classe Validator, retorna false ou true para getInvalidDomains checar se é valido ou não
         */
        private function isValidDomain($domain){
            $separator = new Separator();
            $domainsValids = $separator->getValidDomains(); //Dados necessários ao funcionamento da funcção
            return in_array($domain, $domainsValids);
        }

        /**
         * @param lines: Linhas de um arquivo lido
         * @return emails: array com os emails que são válidos e inválidos
         */
        public function getEmails($lines){
            $leitor = new Reader();
            $lines = $leitor->read("assets/teste.csv");
            $validsEmails = array();
            $invalidsEmails = array();
            
           foreach($lines as $line){
                $domain = Separator::getDomain($line);
                if($this->isValidDomain($domain)){
                    $validsEmails[] = $line;
                }else{
                    $invalidsEmails[] = $line;

                }
           }

           return ['valids' => $validsEmails,'invalids' => $invalidsEmails];
            
        }
    }    
?>