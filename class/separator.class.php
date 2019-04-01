<?php
    require_once("reader.class.php");

    class Separator{
        /** 
         * Função que pega as linhas do arquivo e retorna apenas os domínios.
         * @param lines Linhas de um arquivo lido
         * 
         */
        public function getDomains($lines){
           $domains = array(); //Crio um array com os domínos
           $noDomain = array(); //emails sem dominos
            foreach ($lines as $line) { //Percorro as linhas do arquivo
                if(!empty($line)){ //Checo se a linha é vazia
                    $result = explode("@", $line); //Quebro a linha em dois índices, um é o 'email', outro é o dominio
                    if( count($result) == 2 )
                        $domains[]= $result[1]; //Preencho o array domínios com result[1], que são apenas os domínios
                }
            }
            return $domains; //Retorno os domínios
        }
        /**
         * Funçao estática que retorna o domino da linha em questão
         * @param email E-mail que será usado para buscar dominio.
         */
        public static function getDomain($email){
            if( !empty($email) ) {
                $result = explode("@", $email);
                if( count($result) == 2 )
                    return $result[1];
            }
            return false;
        }

        /**
         * Retorna os domínios válidos
         */
        public function getValidDomains(){
            $leitor = new Reader(); //Instancia um novo leitor
            $lines = $leitor->read(LIST_DOMAINS); //Chama a função do leitor passando a lista de domínios como parametro
            if(!empty($lines)){ //Se as lihas forem não vazias
                return $lines;  //Retorna as linhas
            } 
        }
        /**
         * Retorna um leitor para os emails
         */
        public function getEmails(){
            $leitor = new Reader(); //Instancia um novo leitor
            return $leitor->read(LIST_EMAILS); //Retorna as linhas do arquivo (Os emails)
        }
        
 }
?>