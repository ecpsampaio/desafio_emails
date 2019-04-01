<?php
    if($_POST){ 
        $domain = $_POST['domain']; //Crio a variável e-mail apenas quando submeto
        if(empty($domain)){ //Se após submeter estiver vazia exibo um alerta-->
?>  
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                Preenha o campo E-mail
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>        
<?php  
        }else{ //Se não estiver vazia
                $file = fopen("assets/domain_list.csv", "a+"); //Arquivo aberto na memória
                fwrite($file, "'". $domain  . "'\n"); //Escrita no arquivo
                fclose($file); //Fecho o arquivo      
?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Dominio cadastrado com sucesso!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
<?php  }
    }
?>
<div class="container">
    <div class="row mt-5 justify-content-center">
        <div class="col-md-8 text-center">
            <h1 class="display-4">Cadastre um novo domínio</h1>
        </div>
    </div>
    <div class="row mt-5 justify-content-center">
        <div class="col-md-5">
            <form  method="post" id="form" class="rounded shadow hvr-float w-100">
                <div class="form-group">
                    <label>Domínio</label>
                    <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">@</span>
                    </div>
                        <input type="text" class="form-control" name="domain" placeholder="dominio.com.br" aria-label="dominio.com.br" aria-describedby="basic-addon1">
                    </div>
                </div>
            <button type="submit" class="btn btn-primary mt-3">Cadastrar</button>
            </form>
        </div>
        
    </div>
</div>