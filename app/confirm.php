<?php

if (isset($_POST['mail']) == false) {
    header("Location: ../app/teste.php?return=error");
}

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

// exceções
foreach ($exception_list as $exp) {
    $except[] = new _Exceptions($exp['domainAdress'],$exp['rule']);
}

$mail = new _Mails($_POST['mail']);

foreach ($domain_obj as $domain) { // passagen de objeto dominio
    ValidDomain($mail,$domain); // valida os dominios
}

foreach ($domain_obj as $domain) { // passagen de objeto dominio
    foreach ($except as $exp_list) {
        ErrorDomain($mail,$domain,$priority_list,$exp_list); // função de análise de erros
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SearchMail - Teste de script</title>
    <?php 
    require_once $path."/config/allfront.php";
    ?>
</head>
<body>
    <?php require_once $path."/config/navbar.php"; ?>
    <!--how it works -->
    <div class="tap-target bg-y" data-target="menu">
        <div class="tap-target-content">
            <h5 class="ftb">Confirmação de e-mail:</h5>
            <p class="ftb">Verifique e de necessário modifique o e-mail digitado anteriormente.</p>
        </div>
    </div>

    <!-- Element Showed -->
    <div class="fixed-action-btn">
        <a id="menu" class=" waves-light btn btn-floating" ><i class="material-icons">?</i></a>
    </div>

    <div class="container">
        <h1>Confirmar e-mail</h1>
        <form id="mailform" method="POST" action="../fun/addCorrectMail.php">
            <div class="input-field col s12">
                <input id="email" type="email" class="validate" name="mail" value="<?php echo $_POST['mail']; ?>">
                <label for ="email">O endereço digitado foi:</label>
                <input class="btn waves-effect waves-light" value="Enviar" name="Enviar" placeholder="Enviar" type="submit">
            </div>
        </form>
    </div>
</body>
<?php require_once $path."/config/footer.php";?>
</html>