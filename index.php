<?php
  ini_set('display_errors',1);
  ini_set('display_startup_erros',1);
  error_reporting(E_ALL);
  define('LIST_EMAILS', 'assets/email_list.csv');
  define('LIST_DOMAINS', 'assets/domain_list.csv');

  include("class/reader.class.php");
  include("class/separator.class.php");
  include("class/validator.class.php");
  include("class/corrector.class.php");
  include("class/report.class.php");
  
 ?>

<!doctype html>
  <html lang="en">
    <head>
      <?php include("resources/head.php");?>
    </head>
    <body>  
      <?php include("resources/header.php");?>
      <?php include("resources/body.php");?>
    </body>
  </html>
