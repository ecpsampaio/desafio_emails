<script>
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Erro', 'Quantidade'],
          <?php foreach($error_list as $value): ?> 
            ['<?php echo $value->getCase();?>',<?php echo($value->getErrorCount()); ?>],
        <?php endforeach; ?>

        ]);

        var options = {
          title:    'Casos de Erro',
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_errorcases'));

        chart.draw(data, options);
      }
    </script>