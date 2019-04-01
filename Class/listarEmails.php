
<?php
 include("Includes/header.php"); 
 include("crud.php");
 ?>

    <div class="Content">
    <h1>Lista</h1>
         <?php
            $Crud=new crud();
            $Id=filter_input(INPUT_GET,'id',FILTER_SANITIZE_SPECIAL_CHARS);

            $BFetch=$Crud->listDB(
                "*",
                "emaillist",
                 array()
            );
             
            while($Fetch=$BFetch->fetch(PDO::FETCH_ASSOC)):
                foreach($BFetch as $value){
                    $email = explode('@', $value['email']);
                    
                    echo "<br>";
                
                    echo "<br>";
                        if($veri = strstr($email[1],'n')==TRUE){
                            $email[1] = "msn.com";    
                        }elseif($veri = strstr($email[1],'s')==TRUE){
                            $email[1] = "msn.com"; 
                        }elseif($veri = strstr($email[1],'br')==TRUE){
                            $email[1] = "hotmail.com.br";
                        }elseif($veri = strstr($email[1],'mx')==TRUE){
                            $email[1] = "hotmail.com.mx";
                        }elseif($veri = strstr($email[1],'ar')==TRUE){
                            $email[1] = "hotmail.com.ar";
                        }elseif($veri = strstr($email[1],'h')==TRUE){
                            $email[1] = "hotmail.com";
                        }else {
                            $email[1] = "gmail.com";
                        } 
                        $result = "E-mail: $email[0]@$email[1]";
                        $dominio = $email[1];
                        echo $result;
                       
                        
                }
               
                 
                

        ?>
           
        
            <?php 
            endwhile;
            ?>
    
    </div>

<?php include("Includes/footer.php"); ?>

