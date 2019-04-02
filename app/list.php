<?php
$path = dirname(__DIR__);
$mail = NULL;
require_once $path."/database/_sql_connect.php";
if (isset($_GET['mail'])) {
    if ($_GET['mail'] != "") {
        $mail = $_GET['mail'];
    } else {
        $mail="no";
    } 
} else {
    $mail = false;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SearchMail - Lista geral</title>
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
    <h1>Busca por endereço</h1>
        <section id="rules">
            <form method="POST" action="../fun/searchlist.php">
            <div class="row">
                <label for="">E-mail</label>
                <input type="text" name="mail" required placeholder="digite a ocorrência a ser detectada">    
                <input class="btn waves-effect waves-light" type="submit" placeholder = "Enviar"value="Enviar">
            </div>
            </form>

            <table class="responsive-table centered striped">
                <tr>
                    <th>Endereço</th>
                    <th>Opção</th>
                </tr>
                <tr>
                    <td>
                    <?php 
                    if($mail == "no") {
                        echo "Não encontrado"; 
                        echo '<script>alert("Não encontrado")</script>';

                    } else if ($mail == NULL) {
                        echo "faça uma busca";
                    } else {
                        echo $mail;
                        echo '<td><a class= "btn btn-delete" href="../fun/deletethis.php?id='.$_GET['id'].'">Deletar</a></td>';
                    }
                    ?>
                    </td>
                </tr>
            </table>
        </section>
    </div>
</body>

    <?php require_once $path."/config/footer.php";?>
</html>
