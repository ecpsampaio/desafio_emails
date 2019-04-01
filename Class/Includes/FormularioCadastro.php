

<div class= "Resultado"></div>

<div class= "Formulario">
    <h1 class="Center">Cadastro</h1>
    
    <form name = "FormCadastro" id="FormCadastro" method= "post" action= "Controller/controllerCad.php"><br> <br> <br>
    <div class="FormularioInput">
        <label>E-mail:<br></label> 
        <input type= "email" name= "Email" id= "cemail" placeholder= " usuario@provedor.com.br"/>
    </div>
    <div class="FormularioInput FormularioInput100.Center">
        <input type= "submit" value= "Cadastrar"/>
    </div>
    </form>
</div>
</div> 
<?php

//validar com @
$email = "usuario@provedor.com.br";
if( strstr($email,"@")){
    
}
?>
