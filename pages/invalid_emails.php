<div class="container">
    <div class="row mt-5 mb-5 justify-content-center">
    <div class="col-md-8 text-center">
        <h1 class="display-4">Estatísticas de e-mails inválidos</h1>
    </div>
    </div>
</div>
<?php
    $statics = new Report();
    $data = $statics->getInvalidsDomainsReport();
    $countInvalidEmails = $statics->getCountInvalidEmailsReport();
    $data = json_encode($data);
    $highestOccurrence = $statics->getHighestOccurrenceReport()[0];
    $highestOccurrenceEmail = $statics->getHighestOccurrenceReport()[1];
    $lessOccurrence = $statics->getLessOccurrenceReport()[0];
    $lessOccurrenceEmail = $statics->getLessOccurrenceReport()[1];

?>
<div class="container mb-5 mt-5">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <canvas id="myChartInvalidos"></canvas>
        </div>
        <div class="col-md-3">
            <div class="row">
                <div class="card mt-5 text-center" style="width: 18rem;">
                    <ul class="list-group list-group-flush">
                    <div class="card-header">
                        Maior Ocorrência
                    </div>                    
                    <li class="list-group-item"> <?php echo "$highestOccurrenceEmail: $highestOccurrence";?> </li>
                    </ul>
                </div>
                <div class="card mt-5 text-center" style="width: 18rem;">
                    <ul class="list-group list-group-flush">
                    <div class="card-header">
                        Menor Ocorrência
                    </div>                    
                    <li class="list-group-item"> <?php echo "$lessOccurrenceEmail: $lessOccurrence";?> </li>
                    </ul>
                </div>
                <div class="card mt-5 text-center" style="width: 18rem;">
                    <ul class="list-group list-group-flush">
                    <div class="card-header">
                        Total de E-mails Inválidos
                    </div>                    
                    <li class="list-group-item"> <?php echo "$countInvalidEmails";?> </li>
                    </ul>
                </div>
            </div>
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
    colors.push('rgba('+red+ ',' + green + ',' + blue + ', 0.4)');
    borders.push('rgba('+red+ ',' + green + ',' + blue + ', 1)');
}
var ctx = document.getElementById('myChartInvalidos');
var myChart = new Chart(ctx, {
    type: 'doughnut',
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

