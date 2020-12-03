<?php
require_once "../../../Connect/Connect.php";
session_start();

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
		function getUser($id) : string 
		{
			$query = Connect::getInstance()->prepare(
				"SELECT name FROM users WHERE id = ".$id
			);
			$query->execute();
			$res = $query->fetchAll();
			return (string) $res[0]->name;

		}
		function getDoc($id) : string
		{
			$query = Connect::getInstance()->prepare(
				"SELECT number FROM documents WHERE id = ".$id
			);
			$query->execute();

			$res = $query->fetchAll();
			return (string) $res[0]->number;


		}
		$id = $_GET['id'];

		$con = Connect::getInstance()->prepare(
			"SELECT * FROM historic WHERE id_doc=" .$id
		);
		$con->execute();

		foreach($con->fetchAll() as $row){

			print getDoc($row->id_doc);
			print "<br>";
			print getUser($row->id_user);
		}

		//test
	?>
</body>
</html>
