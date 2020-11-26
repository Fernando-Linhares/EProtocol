
<!DOCTYPE html>
<html lang="en">
<head>
	<?php
require "../../../../Connect/Connect.php";

session_start();

$id = $_GET['id'];
$iduser = $_SESSION['data_user'][0]->id;
$con = Connect::getInstance()->prepare(
	"SELECT * FROM users WHERE id != $iduser"
);
$con->execute();
include "../../../../assets/includes/header.php";
?>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>send User</title>
	<style>
		select{
			display: block;
		}
	</style>
</head>
<body>
	<div style="width: 60%;margin:auto; text-align: center;" class=" card-panel white">

		<form action="run.php" method="post">
		<h3>Enviar documento para:</h3>
			<div class="input-field col s12">
				<select name="users">
					<?php 
					foreach ($con->fetchAll() as $row) {
						$name = $row->name;
							$id_user = $row->id;
							print "<option value='$id_user'>$name</option>";
						}
						?>
				</select>
			</div>
			<div><input type="hidden"  name="id" value="<?= $id; ?>"></div>
			<div><input class="btn orange" value="enviar" type="submit"></div>
			<br><br>
			<i class="material-icons">face</i>
			<br><br>
		</form>
	</div>
	
</body>
</html>