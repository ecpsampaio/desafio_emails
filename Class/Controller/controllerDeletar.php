<?php
 include("../crud.php");
 
$Crud=new crud();
$IdUser=filter_input(INPUT_GET,'id',FILTER_SANITIZE_SPECIAL_CHARS);

$Crud->deleteDB(
    "cadastro",
    "Id=?",
    array(
        $IdUser
    )
);
    echo "Dado deletado com sucesso!";

?>