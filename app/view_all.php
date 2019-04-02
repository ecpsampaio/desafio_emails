<?php
// database connection
    $path = dirname(__DIR__);
    include_once $path."/database/_sql_connect.php";
    include_once $path."/tables/_domainList.php";
    include_once $path."/tables/_mailoldlist.php";
    include_once $path."/tables/_correctmails.php";
    include_once $path."/tables/_explist.php";


    // funções
    require_once $path."/fun/ValidDomain.php";
    require_once $path."/fun/ErrorDomain.php";
    require_once $path."/fun/ErrorCounter.php";
    require_once $path."/fun/WhereErrorDomain.php";

    //classes
    require_once $path."/_class/_Mails.php";
    require_once $path."/_class/_Domain.php";
    require_once $path."/_class/_Region.php";
    require_once $path."/_class/_ErrorCase.php";
    require_once $path."/_class/_Exceptions.php";

    // carregadores
    require_once $path."/fun/carryCorrectCases.php";

    // lista de dominio
        // teste
        // $doms = array("gmail.com","hotmail.com","hotmail.com.br","hotmail.com.mx","hotmail.com.ar","msn.com");
        // banco de dados
        foreach ($list_domainoldlist as $value) {
            $doms[] = $value["domainAdress"];
        }
        // lista de prioridade em caso de semelhança
        // $priority_list = array("msn.com","hotmail.com.br","hotmail.com.mx","hotmail.com.ar","hotmail.com","gmail.com");
        $priority_list = array_reverse($doms);
    // carregando dominios e regiões como objeto
    foreach ($doms as $value) {
        $domain_obj[] = new _Domain($value);
    }

    // carregando as regioes em um array
    foreach ($domain_obj as $value) {
        $AllRegions[] = $value->getRegion();
    }
    // array de regiões
    $reg = array_unique($AllRegions); // array de regiões sem repetição

    // criando objeto contendo as possíveis regios
    foreach ($reg as $value) {
        $region[] = new _Region($value);   
    }

    // lista de enail
    // lista teste
    // $mailList = array("paulo@msn.com","jose@gmailk.com","icaro@hoitmal.com.fr","lucio@hotmail.com","icaro@tmsn.com","lucio@hotmal.com","victor.baiao1101@gmil.com","jose@gmail.com","mark@gmal.com");
    foreach ($list_mailoldlist as $value) {
        $mailList[] = $value["mailAdress"];
    }
    // carregando emails como objetos
    foreach ($mailList as $value) {
        $mail_obj[] = new _Mails($value);
    }
    
    // tabela de exceções
    foreach ($exception_list as $exp) {
        $except[] = new _exceptions($exp['domainAdress'],$exp['rule']);
    }
    
    // validador de dominio
    foreach ($mail_obj as $mail) { // passagen de objeto email
        foreach ($domain_obj as $domain) { // passagen de objeto dominio
            ValidDomain($mail,$domain); // valida os dominios
        }
    }


    // subistituição e correção dos dôminios   
    foreach ($mail_obj as $mail) { // passagen de objeto email
        foreach ($domain_obj as $domain) { // passagen de objeto dominio
            foreach ($except as $exp_list) {
                ErrorDomain($mail,$domain,$priority_list,$exp_list); // função de análise de erros
            }
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SearchMail - Listar geral</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php
    require_once $path."/config/allfront.php";
    ?>
    <link rel="stylesheet" type="text/css" media="screen" href="./css/domain.css">
</head>
<body>
    <?php require_once $path."/config/navbar.php"; ?>
    
    <!--how it works -->
    <div class="tap-target bg-y" data-target="menu">
        <div class="tap-target-content">
            <h5 class="ftb">Busca de endereços</h5>
            <p class="ftb">Nesta parte é possível buscar e deletar um endereço da lista.</p>

        </div>
    </div>

    <!-- Element Showed -->
    <div class="fixed-action-btn">
        <a id="menu" class=" waves-light btn btn-floating" ><i class="material-icons">?</i></a>
    </div>
    
    <div class="container">
            <table class="responsive-table centered striped">
                <tr>
                    <th>Endereço</th>
                </tr>
                    <?php 
                    foreach ($mail_obj as $value) {
                        echo "<tr><td>".$value->getUser()."@".$value->getSimilarDomain()."</tr></td>";
                    }
                    ?>
            </table>
        </section>
    </div>
</body>

    <?php require_once $path."/config/footer.php";?>
</html>
