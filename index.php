<!DOCTYPE html>
<?php

?>
<html>
    <head>
        
        <script src="js/jquery-3.3.1.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.js" type="text/javascript"></script>
        <script src="js/bootstrap.bundle.min.js" type="text/javascript"></script>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
         <meta charset="UTF-8">
        <title>VALIDA DOR DE EMAILS</title>
    </head>
    <body>

<div class="container-fluid"><nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">E-VALIDATOR</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
     
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          MENUS
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="?get=validaEmail">Validar Email</a>
          <a class="dropdown-item" href="?get=cadEmail">Cadastrar Email</a>
          <a class="dropdown-item" href="?get=relEmail">Relatorio</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Sair</a>
        </div>
      </li>
     
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
    <div class="row">
        <?php
        
if($_GET){
   $p = $_GET['get'];
    switch ($p)
    {
    case "validaEmail":
        include_once 'validarEmail.php';
        break;
    case "cadEmail":
        include_once 'cadEmail.php';
        break;
    case "getrelEmail":
        include_once 'getrelEmail.php';
        break;
    case "relEmail":
        include_once 'relEmails.php';
        break;
    default :
        break;
    }
}
    

    ?>
    </div>
    
    
</div>

        
</body>
</html>
