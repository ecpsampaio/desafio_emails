<?php
include("../Includes/variaveis.php"); 
include('../crud.php');

$Crud=new crud();
$Crud->insertDB(
        "cadastro",
        "?,?",
        array(
            $Id,
            $Email
        )
);

echo "Cadastro Realizado com Sucesso!";
?>
    






