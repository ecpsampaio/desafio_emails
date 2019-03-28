<?php
    require_once("reader.class.php");

    class Separator{
        /** 
         * Função que pega as linhas do arquivo e retorna apenas os domínios.
         * @param lines Linhas de um arquivo lido
         * 
         */
        public function getDomains($lines){
           $dominios = array(); //Crio um array com os domínos
            foreach ($lines as $line) { //Percorro as linhas do arquivo
                $result = explode("@", $line[0]); //Quebro a linha em dois índices, um é o 'email', outro é o dominio
                $dominios[]= $result[1]; //Preencho o array domínios com result[1], que são apenas os domínios
            }
            return $dominios; //Retorno os domínios
        }

        /**
         * Retorna os domínios válidos
         */
        public function getValidDomains(){
            $leitor = new Reader(); //Instancia um novo leitor
            $lines = $leitor->read('assets/domain_list.csv'); //Chama a função do leitor passando a lista de domínios como parametro
            return $lines;  //Retorna as linhas 
        }

        
    }
?>