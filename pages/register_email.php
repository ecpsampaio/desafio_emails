<?php
    if($_POST){ 
        $email = $_POST['email']; //Crio a variável e-mail apenas quando submeto
        if(empty($email)){?>  <!--Se após submeter estiver vazia exibo um alerta-->
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                Preencha o campo E-mail
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>   
<?php  
        }else{ //Se não estiver vazia
            $domain = Separator::getDomain($email); //Pego o dominio
            $validator = new Validator();  //Instanca da classe validador
            $isValid = $validator->isValidDomain($domain); //Retorna se o dominio é valido
            if($isValid){ 
                $file = fopen(LIST_EMAIL, "a+"); //Arquivo aberto na memória
                fwrite($file, "'". $email  . "'\n"); //Escrita no arquivo
                fclose($file); //Fecho o arquivo      
?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Email cadastrado com sucesso
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
<?php      }else{ 
?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    O dominio é invalido
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
<?php       }
        }
    }
?>
<div class="container">
    <div class="row mt-5 justify-content-center">
        <div class="col-md-8 text-center">
            <h1 class="display-4">Cadastre um novo e-mail</h1>
        </div>
    </div>
    <div class="row mt-5 justify-content-center">
        <div class="col-md-5">
            <form  method="post" id="form" class="rounded shadow hvr-float w-100">
                <div class="form-group">
                    <label for="exampleInputEmail1">Endereco de email</label>
                    <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="nome@dominio.com">
                </div>
            <button type="submit" class="btn btn-primary mt-3">Cadastrar</button>
            </form>
        </div>
        
    </div>
</div>