<?php 

if(isset($_POST['Id'])){ $Id=filter_input(INPUT_POST,'Id',FILTER_SANITIZE_SPECIAL_CHARS); }elseif(isset($_GET['Id'])){ $Id=filter_input(INPUT_GET,'Id',FILTER_SANITIZE_SPECIAL_CHARS); }else{ $Id=0; }
if(isset($_POST['Email'])){ $Email=filter_input(INPUT_POST,'Email',FILTER_SANITIZE_SPECIAL_CHARS); }elseif(isset($_GET['Email'])){ $Email=filter_input(INPUT_GET,'Email',FILTER_SANITIZE_SPECIAL_CHARS); }else{ $Email=""; }


?>