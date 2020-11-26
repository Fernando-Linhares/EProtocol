<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    session_start();
    function toPrint(array $data){
        foreach($data as $d):
           echo "<div id='msg' class='card-panel red-text red lighten-4'> $d </div> ";
        endforeach;
    }
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>protocol</title>
    <?php include "assets/includes/header.php"; ?>
</head>
<body style="background-image: url('assets/images/image.png'); background-size: 100%;">
        <div id="form" class="card-panel white">
            <?php
                toPrint($_SESSION);
               
              ?>
            <form action="Core/Acess/index.php" method="post">
                <div class="input_field">
                    <label for="email">Email:</label>
                    <input class="validate" id="email" name="email" type="text">

                </div>
                <div class="input_field">
                    <label for="password">Password:</label>
                    <input id="password" name="password" type="password">
                </div>
                <div>
                    <input type="submit" value="send" class="btn blue">
                </div>
            </form>
            <br>
            <br>
            <div><a href="Core/Register/index.php" class="btn green">Register</a></div>

        </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>