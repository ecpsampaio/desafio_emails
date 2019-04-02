<div class="navbar-fixed">
    <nav class="nav">
        <a href="#" class="brand-logo right"><img class="logo-brand-img" alt="ecGlobal" src="../app/img/brand.png"></a>
        <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        <ul id="nav-mobile" class="left hide-on-med-and-down">
            <li><a href="./Menu.php">Início</a></li>
            <li><a href="./relatorio.php">Relatório</a></li>
            <li><a href="./teste.php">Adicionar E-mails</a></li>
            <li><a href="./list.php">Buscar E-mails</a></li>
            <li><a href="./domain.php">Dominios</a></li>
            <li><a href="./export.php">Exportar/Corrigir definitivamente</a></li>
            <li><a class="btn" id="open_ds">Como funciona</a></li>
        </ul>
    </nav>
</div>
<script>
$(".dropdown-trigger").dropdown();
</script>
<?php
if (isset($_GET['task']) == true) {
    if ($_GET['task'] == "valid") {
        echo "<script>alert('Alteração realizada com sucesso!!!')</script>";
    } else echo "<script>alert('Houve um erro Tente mais tarde')</script>";
}
?>