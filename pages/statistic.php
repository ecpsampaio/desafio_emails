<div class="container">
    <div class="row mt-5 justify-content-center">
    <div class="col-md-8 text-center">
        <h1 class="display-4">Estatísticas de e-mails inválidos</h1>
    </div>
    </div>
</div>
<?php
    $statics = new Report();
    $data = $statics->getInvalidsDomainsReport();
    $data = json_encode($data);
?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <canvas id="myChart"></canvas>
        </div>
    </div>
</div>


<script>

/**
 * Retorna um número aleatório entre dois números
 */
function getRandomArbitrary(min, max) {
    return Math.random() * (max - min) + min;
}

var data = JSON.parse('<?= $data ?>');
var colors = [];
var borders = [];
for (var i = 0; i < Object.values(data).length; i++) {
    var red = getRandomArbitrary(1, 255);
    var blue = getRandomArbitrary(1, 255);
    var green = getRandomArbitrary(1, 255);
    colors.push('rgba('+red+ ',' + green + ',' + blue + ', 0.2)');
    borders.push('rgba('+red+ ',' + green + ',' + blue + ', 1)');
}
var ctx = document.getElementById('myChart');
var myChart = new Chart(ctx, {
    type: 'pie',
    data: {
        //labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
        labels: Object.keys(data),
        datasets: [{
            label: '',
            //data: [12, 19, 3, 5, 2, 3],
            data: Object.values(data),
            backgroundColor: colors,
            borderColor: borders,
            borderWidth: 1
        }]
    }
});
</script>


