<?php
    if(!isset($_GET['page'])){
        include("pages/home.php");
    }else{
        $page_file = 'pages/'.$_GET['page'].".php";
        if(file_exists($page_file)){
            include($page_file);
        }else{
            include("pages/home.php");

        }
    }
?>