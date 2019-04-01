<?php
include("Includes/header.php");
include("crud.php");
 ?>
    <div class="Content"> 
    <table class="TabelaCrud">
     <tr>
         <td>E-mail</td>
         <td>Ações</td>
     </tr>

     <!-- Estrutura de loop -->
    <?php
     $Crud=new crud();
     $BFetch=$Crud->selectDB(
         "*",
         "cadastro",
         "",
         array()
     );

     while($Fetch=$BFetch->fetch(PDO::FETCH_ASSOC)){
    
     
                    $email = explode('@', $Fetch['Email']);
                    
                    //print_r ($email);
                    echo "<br>";
                    //$sim = similar_text('msn', $email [1],$percent);
                    //hotmail e gmail
                    //usar o similiar
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
                        $result = "$email[0]@$email[1]";
                        
                        //echo $result;
                        //echo $dominio;
                       
                
                ?>
     <tr>
         <td><?php echo $result; ?></td>
         <td> 
            <a class = "Deletar" href="<?php echo "Controller/controllerDeletar.php?id={$Fetch['Id']}"; ?>"> <input type= "submit" value= "Deletar"></a>
         </td>
     </tr>
     <?php } ?>
</table>
       </div> 

<?php include("Includes/footer.php"); ?>