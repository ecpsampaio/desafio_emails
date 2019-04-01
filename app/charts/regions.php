<script type="text/javascript">
    google.charts.load('current', {'packages':['bar']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
    var data = google.visualization.arrayToDataTable([
        ['Regiões', 'Total', 'Erro', 'Correto'],
        <?php foreach($region as $value): ?>
            ['<?php echo $value->getRegion();?>',
            <?php echo($value->getTotalCount()); ?>,
            <?php echo($value->getErrorCount()); ?>,
            <?php echo($value->getCorrectCount()); ?>],
        <?php endforeach; ?>
    ]);

    var options = {
        chart: {
        title: 'Regiões',
        },
        bars: 'horizontal' // Required for Material Bar Charts.
    };

    var chart = new google.charts.Bar(document.getElementById('barchart_material_regions'));

    chart.draw(data, google.charts.Bar.convertOptions(options));
    }
</script>