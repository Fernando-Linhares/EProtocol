<?php
require_once "../../../Connect/Connect.php";
session_start();
function selectItem()
{

	$id = $_GET['id'];

	$con = Connect::getInstance()->prepare(
	    "SELECT * FROM historic WHERE id_doc = '$id' "
	);

	$con->execute();

	$res = $con->fetchAll();

	return $res;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<h1>historico</h1>
	<?php
	include "history.php";
	?>
</body>
</html>