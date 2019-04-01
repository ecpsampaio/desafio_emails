<script>
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Corretos',     <?php echo $correctcases; ?>],
          ['Erro',      <?php echo $totalerros; ?>],
          ['indeterminação' , <?php echo $indetermination; ?>]
        ]);

        var options = {
          title: 'Total de Endereços cadastrados: <?php echo count($mail_obj); ?>'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>