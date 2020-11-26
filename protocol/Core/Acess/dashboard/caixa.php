<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    require_once "../../../Connect/Connect.php";
    session_start();
    $data_user = $_SESSION['data_user'];
    
?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= ucfirst($data_user[0]->name); ?></title>
</head>
<body>


<header class="card-panel blue">

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
                <a class="btn blue"  href="newdoc.php">
                    <i class="material-icons">add</i>
                </a>
           </div>
            <div class="col s2">
            <a class="btn green" href="index.php">
                    <span>to folder</span>
                <i class="material-icons right">folder</i>
            </a>
            </div>
            <div  class="col s2">
                <a class="btn blue" href="caixa.php" >
                        <span>folder</span>
                    <i class="material-icons right">folder_open</i>
                </a>
            </div>
        </div>
        

      <div class="container">
          <div class="card-panel white">
            <?php
            $query = "SELECT * FROM documents WHERE id_user = '".$data_user[0]->id."' AND acepted = '1'";
            $con = Connect::getInstance()->prepare($query);
            $con->execute();
            $res = $con->fetchAll();
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
                echo "<td><a class='btn orange' href='Tramitate/index.php?id=".$id."'>enviar</a></td></tr>";
                                        
            endforeach;
            echo "</table>";
        ?>
    </div>
      </div>
    
</body>
</html>