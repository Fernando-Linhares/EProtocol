<!DOCTYPE html>
<html lang="en">
<head>
	<?php
	session_start();
	$user = $_SESSION['user'];
	?>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Conta Criada</title>
</head>

<body>
	<pre>
		Parabéns voce é um usuario! Agora seus dados.
		email:<?= $user['email'];?>
		senha:<?= $user['password']; ?>
		nome:<?= $user['name']; ?>
	</pre>
	<br>
	<br>
	<a href="../../">voltar</a>
</body>
</html>