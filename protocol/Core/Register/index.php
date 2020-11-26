<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Register</title>
	<?php include "../../assets/includes/header.php"; ?>
</head>
<body style="background-image: url('../../assets/images/image.png'); background-size: 100%;">
		<div id="form">
			<div class="card-panel white">
			<form  action="register.php" method="post">
				<div>
					<label for="">Name:</label>
					<input type="text" name="name" placeholder="digite seu nome">
				</div>
				<div>
					<label for="">Email:</label>
					<input type="email" name="email" placeholder="digite seu email">
				</div>
				<div>
					<label for="">Password:</label>
					<input type="password" name="password" placeholder="digite seu senha">
				</div>
				<div><input type="submit" class="btn blue" value="send"></div>
			</form>
		</div>
	</div>
</body>
</html>