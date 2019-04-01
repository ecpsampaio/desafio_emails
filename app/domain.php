<?php
$path = dirname(__DIR__);
require_once $path."/database/_sql_connect.php";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SearchMail - Lista de prioridade</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php
    require_once $path."/config/allfront.php";
    ?>
    <link rel="stylesheet" type="text/css" media="screen" href="./css/domain.css">
</head>
<body>
    <?php require_once $path."/config/navbar.php"; ?>
    
    <!--how it works -->
    <div class="tap-target bg-y" data-target="menu">
        <div class="tap-target-content">
            <h5 class="ftb">Domínios e regras:</h5>
            <p class="ftb">Nesta parte é possível configurar os domínios usadoas no algorítimo e as regras e ecxeções que determinam um domínio</p>
        </div>
    </div>

    <!-- Element Showed -->
    <div class="fixed-action-btn">
        <a id="menu" class=" waves-light btn btn-floating" ><i class="material-icons">?</i></a>
    </div>
    
    <div class="container">

            <h1>Domínios e regras</h1>
    <section id="rules">
        <h2>Regras</h2>
        <form method="POST" action="../fun/addRule.php">
        <div class="row">
            <div class="col s3">
                <label for="">Regra</label>
                <input type="text" name="newRule" required placeholder="digite a ocorrência a ser detectada">    
            </div>
            <div class="col s4">
                <label for="">Dôminio relacionado</label>
                <input type="text" name="newDomain" required placeholder="digite apenas o domínio: example.com">
            </div>
            <div class="col s4">
                <input class="btn waves-effect waves-light" type="submit" placeholder = "Enviar"value="Enviar">
                </div>
        </div>
        </form>

        <table class="responsive-table centered striped">
            <tr>
                <th>Regras</th>
                <th>Domínio</th>
                <th>Opções</th>
            </tr>
            <?php
        if (verfy_tb("domainlist") != false) {
            $cx = cx_bench("mailtool");
            $query = "SELECT * FROM exception";
            $stmt = $cx->prepare($query);
            $stmt->execute();
            $list = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } 
        // var_dump($list);
        $list = array_reverse($list);
        foreach ($list as $value) {
            echo '<tr>';
            echo "<td>".$value['rule']."</td>";
            echo "<td>".$value['domainAdress']."</td>";
            echo '<td>
            <a class="btn btn-delete" href = "../fun/dropRule.php?domain='.$value['domainAdress'].'">Deletar</a>
            </td>';
            echo '</tr>';
        }
        ?>
        </table>
    </section>
    <section id="dominios">
            <h2>Domínios</h2>
            <form method="POST" action="../fun/addDomain.php">
            <label>Inserir novo</label>
                <div class="row">
                    <div class="col">
                        <input type="text" name="newDomain" required placeholder="digite apenas o domínio: example.com">
                    </div>
                    <div class="col">
                        <input type="submit" class="btn waves-effect waves-light" type="submit" placeholder = "Enviar"value="Enviar">
                    </div>
                </div>
            </form>
            <table class="responsive-table centered striped">
                <tr>
                    <th>Domínio</th>
                    <th>Opções</th>
                </tr>
                <?php
            if (verfy_tb("domainlist") != false) {
                $cx = cx_bench("mailtool");
                $query = "SELECT * FROM domainlist";
                $stmt = $cx->prepare($query);
                $stmt->execute();
                $list = $stmt->fetchAll(PDO::FETCH_ASSOC);
            } 
            // var_dump($list);
            $list = array_reverse($list);
            foreach ($list as $value) {
                echo '<tr>';
                echo "<td>".$value['domainAdress']."</td>";
                echo '<td>
                <a class="btn btn-up" href = "../fun/move_to_down.php?value='.$value['domainAdress'].'">Subir</a>
                <a class="btn btn-delete" href = "../fun/dropDomain.php?domain='.$value['domainAdress'].'">Deletar</a>
                <a class="btn btn-down"href = "../fun/move_to_up.php?value='.$value['domainAdress'].'">Descer</a>
                </td>';
                echo '</tr>';
            }
            ?>
        </table>
    </section>
    </div>
</body>

<?php require_once $path."/config/footer.php";?>
</html>
