<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>novo documento</title>
    <?php
        include "../../../assets/includes/header.php";
    ?>
    <style>
        i{

            font-size: 200px;
        }
    </style>
</head>
<body>
    <div id="form">
        <h3>Adicionar novo documento <i class="material-icons right">description</i></h3>
        <form action="insert.php" method="post">
        

        <div>
            <label>Titulo</label>
            <input name="title" type="text">
        </div>
        <div>
            <label for="">Numero do documento</label>
            <input name="number" type="number">
        </div>
        <div>
            <label for="">Descrição</label>
            <textarea class="materialize-textarea"  name="description"></textarea>
        </div>
        <div>
            <label for="">Protocolo</label>
            <input type="number" name="protocol">
        </div>
        <div>
            <label for="">Volume</label>
            <input type="number" name="vol">
        </div>
        <div class="row">
            <div class="col s6">
                <input class="btn yellow" value="salvar" type="submit">
            </div>
            <div class="col s3"><a href="caixa.php" class="btn red">cancelar</a></div>
        </div>
        </form>
    </div>
    
</body>
</html>