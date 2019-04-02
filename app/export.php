<?php $path = dirname(__DIR__); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SearchMail - Exportação</title>
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
            <h5 class="ftb">Exportar tabelas</h5>
            <p class="ftb">Nesta parte é possível exportar os endereços corrigidos em em .CSV</p>
            <p class="ftb">OBS: alguns casos podem demorar</p>
        </div>
    </div>

    <!-- Element Showed -->
    <div class="fixed-action-btn">
        <a id="menu" class=" waves-light btn btn-floating" ><i class="material-icons">?</i></a>
    </div>

    <div class="container">
        <h1>Exportar tabelas</h1>
        <h2>Somente a exportação aplica a correção em definitivo</h2>
        <h2>OBS: caso seja iniciada a exportação recomenda-se que o usuário não ultilize a ferramenta até que a exportação esteja concluida</h2>
        <a class="btn" href="../app/exp/csv.php">Exportar em CSV</a>
        <a class="btn" href="../app/exp/csv.php">Exportar em SQL</a>
        <a class="btn" href="../app/view_all.php">Ver previsão</a>

    </div>
    <?php require_once $path."/config/footer.php"; ?>
    <script type="text/javascript" src="./js/getForm.js"></script>
</body>
<?php require_once $path."/config/footer.php";?>
</html>