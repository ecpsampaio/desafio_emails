<div class="container">
    <div class="row mt-5 justify-content-center">
        <div class="col-md-8 text-center">
            <h1 class="display-4">Emails Corrigidos</h1>
        </div>
    </div>
</div>
<?php 
    $leitor = new Reader();
    $lines = $leitor->read(LIST_EMAILS); //Executo a função que lê o arquivo CSV
    $separator = new Separator(); //Instancio o separador
    //var_dump($separator->getDomains($lines)); //Executo a função que pega apenas os domínios
    $domValid = $separator->getValidDomains(); //Função que retorna a lsita de domínios válidos
    $validator = new Validator();
    $invalidEmails = $validator->getEmails($lines)['invalids']; //Pego emails invalidos
    $corrector = new Corrector();
    $correctedEmails = $corrector->correct($invalidEmails);   //Corrige emails invalidos 
?>  
<div class="container">
    <div class="row mt-5 justify-content-center">
        <div class="col-8 text-center" >
            <div class="card">
                <div class="card-header">
                       E-mails
                </div>
                <ul class="list-group list-group-flush">
<?php                       
    foreach($correctedEmails as $key => $value){ ?>
        <li class="list-group-item"><?php echo " $value";?></li>
<?php   }
?>
                </ul>
            </div>
        </div> 
    </div>
</div>