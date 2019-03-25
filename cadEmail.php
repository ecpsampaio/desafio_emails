<?php ?>
<div class="col-auto">
    <form>
        <div class="form-group">
            <label for="exampleInputEmail1">Cadastrar Novo Email</label>
            <input type="email" class="form-control" id="email" name="email"aria-describedby="emailHelp" placeholder="Enter email">
            <small id="emailHelp" class="form-text text-muted">Digite um email para cadastrar.</small>
        </div>
        <div class="alert-danger" id="erro"></div>
        <div class="alert-success" id="ok"></div>

        <button type="button" class="btn btn-primary" id="submit">Submit</button>
    </form>
</div>
<script>
    $(document).ready(function () {

        $("#submit").click(function () {
            var email = $("#email").val();
            console.log(email);
            if(email)
            {
                 var url = "./inc/ajax.php?email=" + email;
            $.get(url, function (data, status) {
                console.log(data);
                ret = JSON.parse(data);
                
                if(ret['erro'] == '1')
                {
                     
                    $("#erro").append("<h4>EMAIL ENVIADO COM ERRO PORÉM CONSEGUIMOS VALIDAR.<br> EMAIL CORRIGIDO = "+ret['email_validado']+"</h4>");
                }
            });
            }
            else{
                alert('Digite Um Email');
            }
            
           
        });

    });
</script>

