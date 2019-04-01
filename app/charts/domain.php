<script type="text/javascript">
    google.charts.load('current', {'packages':['bar']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
    var data = google.visualization.arrayToDataTable([
        ['Domínios', 'Total', 'Erro', 'Correto'],
        <?php foreach($domain_obj as $value): ?>
            ['<?php echo $value->getDomain();?>',
            <?php echo($value->getTotalQuant()); ?>,
            <?php echo($value->getErrorQuant()); ?>,
            <?php echo($value->getCorrectCount()); ?>],
        <?php endforeach; ?>
    ]);

    var options = {
        chart: {
        title: 'Domínios',
        },
        bars: 'horizontal' // Required for Material Bar Charts.
    };

    var chart = new google.charts.Bar(document.getElementById('barchart_material_domain'));

    chart.draw(data, google.charts.Bar.convertOptions(options));
    }
</script>