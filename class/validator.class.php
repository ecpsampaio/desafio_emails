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
            $domainsValids = $separator->getValidDomains(); //Dados necessários ao funcionamento da funcção
            //Domains é o array que contém todos os domínios do arquivo
            //Domains é o array que contém todos os domínios validos

            $invalidDomains = array(); //Array com os dominios inválidos

        }
    }
?>