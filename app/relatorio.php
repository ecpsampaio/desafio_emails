<?php
    // cabeçário
    $path = dirname(__DIR__);
    include_once $path."/config/tratament.php";
?> 
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SearchMail - Relatório</title>
    <script src="./js/charts.js"></script>
    <?php require_once $path."/config/allfront.php"; ?>
    <link rel="stylesheet" type="text/css" media="screen" href="./css/relatorio.css">
    <!-- charts -->

</head>
<body>
<?php require_once $path."/config/navbar.php"; ?>
<!--how it works -->
<div class="tap-target bg-y" data-target="menu">
        <div class="tap-target-content">
            <h5 class="ftb">Relatório</h5>
            <p class="ftb">Nesta parte o algorítimo opera em tempo real, disponibilizando os resultados para os 100 mil endereços</p>
        </div>
    </div>

    <!-- Element Showed -->
    <div class="fixed-action-btn">
        <a id="menu" class=" waves-light btn btn-floating" ><i class="material-icons">?</i></a>
    </div>

  
  <!-- Dropdown Structure -->
  <div class="fixa">
      <ul id='dropdown_nav' class='dp_nav dropdown-content grey darken-3'>
        <li><a class="ft_dp"href="#geral">Geral</a></li>
        <li><a class="ft_dp"href="#regioes">Região</a></li>
        <li><a class="ft_dp"href="#dominios">Domínios</a></li>
        <li><a class="ft_dp"href="#errorcases">Casos de erro</a></li>
    </ul>
        <a class='dropdown-trigger btn grey darken-3' href='#' data-target='dropdown_nav'>Clique aqui</a>
    </div>
    <section class = "section-all">
    <div class="container">  <!-- container principal -->
        <div class="row" id="geral"> <!-- linha 1 -->
            <h1>Relatório geral</h1>
                <div class="col s3"> <!-- coluna -->
                    <table class = "responsive-table tbrelatorio">
                        <h2 class = "tbrelatorio legenda">E-mails cadastrados</h2>
                        <tr>
                            <th>Quantidade</th>
                            <td> <?php echo count($mail_obj); ?> </td>
                        </tr>
                        <tr>
                            <th>Endereços corretos</th>
                            <td><?php echo $correctcases; ?></td>
                        </tr>
                        <tr>
                            <th>Endereços incorretos</th>
                            <td><?php echo $totalerros; ?></td>
                        </tr>
                        <tr>
                            <th>Casos de indeterminação</th>
                            <td><?php echo $indetermination; ?></td>
                        </tr>
                    </table>
                </div>
            
            <!-- coluna 2 -->
            <div class="col s3">
                <div id="piechart" style="width: 700px; height: 400px;"></div>
            </div> <!-- fim da coluna -->

        </div> <!-- fim da linha -->

        <!-- regiões -->
        <div class="row" id ="regioes">
            <h2>Regiões</h2>    
            <div id="barchart_material_regions" style="width: 800px; height: 300px;"></div>
        </div> <!-- fim da linha -->

        <!-- dominios -->
        <div class="row" id ="dominios">
            <h2 class = "tbrelatorio legenda">Domínios</h2>
            <div id="barchart_material_domain" style="width: 800px; height: 300px;"></div>
        </div> <!-- fim da linha -->

        <!-- casos de erro -->
        <div class="row" id ="errorcases">
            <h2 class = "tbrelatorio legenda">Casos de erro</h2>
            <div id="piechart_errorcases" style="width: 700px; height: 400px;"></div>
        </div> <!-- fim da linha -->
        
    </div> <!-- fim do container principal -->
</section> <!--fim da seção única -->
</body>
<!-- graficos scripts -->
<?php include_once $path."/app/charts/total.php";   ?>
<?php include_once $path."/app/charts/regions.php";   ?>
<?php include_once $path."/app/charts/domain.php";   ?>
<?php include_once $path."/app/charts/errorcases.php";   ?>
<script>
$('.dropdown-trigger').dropdown();

$('.dp_nav a[href^="#"]').on('click', function(e) {
	e.preventDefault();
	var id = $(this).attr('href'),
            targetOffset = $(id).offset().top;
            var id = $(this).attr('href'),
			targetOffset = $(id).offset().top;
			
	$('html, body').animate({ 
		scrollTop: targetOffset - 150
	}, 500);
});
</script>
<?php require_once $path."/config/footer.php";?>
</html>
