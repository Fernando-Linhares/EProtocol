<?php
try{
	session_start();

	require_once "../../../Connect/Connect.php";

    $data_user = $_SESSION['data_user'];

	$id_user = $data_user[0]->id;

	$number = filter_input(INPUT_POST,'number',FILTER_SANITIZE_STRING);

	$description = filter_input(INPUT_POST,'description',FILTER_SANITIZE_STRING);

	$protocol = filter_input(INPUT_POST,'protocol',FILTER_SANITIZE_STRING);

	$vol = filter_input(INPUT_POST,'vol',FILTER_SANITIZE_STRING);

	$title = filter_input(INPUT_POST,'title',FILTER_SANITIZE_STRING);

	$acepted = true;

	$query =  "INSERT INTO documents(id ,protocol ,number ,vol ,title, description ,date ,id_user ,acepted)";
	
	$query .=	"VALUES (NULL, '$protocol' ,'$number' , '$vol' , '$title', '$description', now() , '$id_user', '$acepted')";


	$con = Connect::getInstance()->prepare($query);

	$con->execute();

	unset($con);

	$con = Connect::getInstance()->prepare(
		"INSERT INTO historic(id,id_doc,id_user,date) VALUES (NULL,LAST_INSERT_ID(),$id_user, now())"
	);
	$con->execute();

	header("location:index.php");
	die();


    }catch(Exception $e){
    	echo $e->getMessage();
    }