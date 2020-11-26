<!DOCTYPE html>
<html lang="en">
<head>
<?php
require "../../../Connect/Connect.php";
session_start();   
$data_user = $_SESSION['data_user']; 
include "../../../assets/includes/header.php";

?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= ucfirst($data_user[0]->name); ?></title>

</head>
<body>
    <header class="card-panel green">

        <div class="row">
        <h3 class="col s8 white-text"><?= ucfirst($data_user[0]->name); ?> </h3>
        <div class="col s2 right">
            <a class="btn red" href="getout.php" >
                <i class="material-icons">exit_to_app</i>
            </a>
        </div>
        </div>
    </header>
   
        <div class="row">
            <div class="col s2 right">
                <a class="btn"  href="newdoc.php">
                    <i class="material-icons">add</i>
                </a>
           </div>
            <div class="col s2">
            <a class="btn green" href="index.php">
                    to folder
                <i class="material-icons right">folder</i>
            </a>
            </div>
            <div  class="col s2">
                <a class="btn blue" href="caixa.php" >
                        folder
                    <i class="material-icons right">folder_open</i>
                </a>
            </div>
            </div>
        
   <div class="container">
       <div class="card-panel white">
        <?php
            try{

            $id_user = $data_user[0]->id;
            $conn = Connect::getInstance()->prepare(
                "SELECT * FROM documents WHERE id_user = '".$data_user[0]->id."' AND acepted = false"
            );
           $conn->execute();
           $res = $conn->fetchAll();   
           echo "<table>";
            foreach ($res as $document):

                $id = $document->id;
                $protocol = $document->protocol;
                $number = $document->number;
                $datefilter = $document->date;
                $date = substr($datefilter,0,4);
                $filtervol = (string)$document->vol;

                $vol = strlen($filtervol)>1? $filtervol: "0" . $filtervol  ;

                echo "<tr><td>{$protocol}.{$number}/{$date}-{$vol}</div></td><td><a class='btn grey' href='select.php?id=".$id."'>select</a></td>";
                echo "<td><a class='btn orange' href='Tramitate/acept.php?id=".$id."&user=$id_user'>aceitar</a></td></tr>";
                                        
            endforeach;
            echo "</table>";

            }catch(PDOException $e){
                print $e->getMessage();
            }catch(Exception $p){
                print $e->getMessage();
            }
            ?>
      </div>
   </div>
   <script src="../../../assets/js/index.js"></script>
</body>
</html>