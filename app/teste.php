<?php
$path = dirname(__DIR__);
require_once $path."/tables/_domainList.php";
?>
<script>
    var domain_list = [<?php 
    foreach ($list_domainoldlist as $value) {
        echo ('"'.$value['domainAdress'].'"'.",");
    } ?>];
</script>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SearchMail - Teste de script</title>
    <?php 
    $path = dirname(__DIR__);
    require_once $path."/config/allfront.php";
    ?>
</head>
<body>
    <?php require_once $path."/config/navbar.php"; ?>
    <!--how it works -->
    <div class="tap-target bg-y" data-target="menu">
        <div class="tap-target-content">
            <h5 class="ftb">Teste em tempo real/ Input:</h5>
            <p class="ftb">Nesta parte é possível visualizar o algorítimo em funcionamento por meio do Javascript/Jquery e permite adicionar endereços de e-mail (já corrigido)</p>
        </div>
    </div>

    <!-- Element Showed -->
    <div class="fixed-action-btn">
        <a id="menu" class=" waves-light btn btn-floating" ><i class="material-icons">?</i></a>
    </div>

    <div class="container">
        <h1>Adicionar email</h1>
        <p><h2>Descrição:</h2>Nesta parte é possível ver o algorítmo em funcionamento pelo Javascript/JQuquery, além de permitir a adesão de endereços de email corrigidos</p>
        <form id ="mailform" action="./confirm.php" method="POST">
            <label for="">Endereço de email</label>
            <input type="email" id ="mail" name = "mail" required>
            <input type="hidden" value="" id="teste" name="teste">
        <div id = "_teste">
        </div>
        <input id="btn-sent" class="waves-effect waves-light btn" type="submit" value="enviar">
        </form>
    </div>
    <script type="text/javascript" src="./js/getForm.js"></script>
</body>
<?php require_once $path."/config/footer.php";?>
</html>