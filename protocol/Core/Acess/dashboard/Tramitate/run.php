<?php
require "../../../../Connect/Connect.php";

$id_doc = $_POST['id'];
$id_user = $_POST['users'];

$tramit = Connect::getInstance()->prepare(
	"UPDATE documents SET id_user = '$id_user' , acepted = false WHERE id ='$id_doc'"
);
$tramit->execute();

$historic = Connect::getInstance()->prepare(
	"INSERT INTO historic(id,id_doc,id_user,date) VALUES (NULL,$id_doc,$id_user,NULL)"
);
$historic->execute();
header("location:../caixa.php");

die();