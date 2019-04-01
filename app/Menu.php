<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SearchMail - Menu</title>
    <?php 
    $path = dirname(__DIR__);
    require_once $path."/config/allfront.php";
    ?>
   </head>
<body>
<div class="navbar-fixed">
    <nav class="nav">
    <a href="#" class="brand-logo left">Seja bem-vindo</a>
        <a href="#" class="brand-logo right"><img class="logo-brand-img" alt="ecGlobal" src="../app/img/brand.png"></a>
        <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    </nav>
</div>
<section class="section">
  <!-- container geral -->
  <div class="container"> 
    <h1>Menu Principal</h1>
    <!-- linha superior de cards -->
    <div class="row">
      <!-- cards -->
      <div class="col s5">
        <div class="card grey darken-3">
          <div class="card-content white-text">
            <span class="card-title">Relatório</span>
            <p>Mostra estatísticas e dados dos e-mail que antes estavam errados.</p>
          </div>
          <div class="card-action">
            <a href="./relatorio.php">Ir para relatório</a>
          </div>
        </div>
      </div> <!-- fim do card -->
      <!-- cards -->
      <div class="col s5">
        <div class="card grey darken-3">
          <div class="card-content white-text">
            <span class="card-title">Regras do algorítimo</span>
            <p>Permite ao usuário configurar os domínios e os casos de exceção.</p>
          </div>
          <div class="card-action">
            <a href="./domain.php">Ir para configurações</a>
          </div>
        </div>
      </div> <!-- fim do card -->
    </div> <!-- fim da  linha -->
    <!-- linha inferior de cards -->
    <div class="row">
      <!-- cards -->
      <div class="col s5">
        <div class="card grey darken-3">
          <div class="card-content white-text">
            <span class="card-title">Exportação</span>
            <p>Permite ao usuário realizar a exportação daquilo que acha necessário</p>
          </div>
          <div class="card-action">
            <a href="./export.php">Ir para exportação</a>
          </div>
        </div>
      </div> <!-- fim do card -->
      <!-- cards -->
      <div class="col s5">
        <div class="card grey darken-3">
          <div class="card-content white-text">
            <span class="card-title">Testar e inserir</span>
            <p>Permite ao usuário testar o algorítimo e adicionar um novo endereço de e-mail.</p>
          </div>
          <div class="card-action">
            <a href="./teste.php">Ir para Testar e Inserir</a>
          </div>
        </div>
      </div> <!-- fim do card -->
    </div> <!-- fim da  linha -->
  </div>
</section>
</body>
</html>