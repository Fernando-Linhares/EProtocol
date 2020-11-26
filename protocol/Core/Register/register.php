<?php
	require "../../Connect/Connect.php";
	session_start();
try{

	function filter_data() :array
	{

	$name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING);
	$email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
	$password = filter_input(INPUT_POST, "password",FILTER_SANITIZE_STRING);

	if(mb_strlen($name)>12)
		 throw new Exception("nome inválido");
	
	if(!filter_var($email, FILTER_VALIDATE_EMAIL))
		throw new Exception("email inválido");

	if(mb_strlen($password)>12)
		throw new Exception("email inválido");

	if($password)

		return [
			"name"=>$name,
			"email"=>$email,
			"password"=>password_hash($password, PASSWORD_DEFAULT)
		];
	}
/*
	function validade(array $data) :bool
	{
		$con = Connect::getInstance()->prepare("SELECT * FROM users WHERE email = '".$data['email']."'");
		$con->execute();

		$res = $con->fetchAll();

		if(count($res)>0):
			return false;
		else:
			return true;
		endif;

			
	}
	*/

	function Register_user()
	{

		$data = filter_data();

		//$validate = validate($data);

		//if($validate):

			$query = "INSERT INTO users(id, name, email, password) VALUES (NULL, :name, :email, :password)";

			$stmt = Connect::getInstance()->prepare($query);
			$stmt->bindParam(":name", $data['name']);
			$stmt->bindParam(":email",$data['email']);
			$stmt->bindParam(":password", $data['password']);
			$stmt->execute();
			$_SESSION['user'] = $data;
			header("location:created_user.php");
			die();
		

		//else:

		//	throw new Exception("email já em uso");

		//endif;

		
	}

	Register_user();
}catch(Exception $e){

	print $e->getMessage();
}