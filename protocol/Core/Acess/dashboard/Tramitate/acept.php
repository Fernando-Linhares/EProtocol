<?php
require "../../../../Connect/Connect.php";

$id_doc = $_GET['id'];
$id_user = $_GET['users'];
$tramit = Connect::getInstance()->prepare(
	"UPDATE documents SET acepted = true WHERE id ='$id_doc'"
);
$tramit->execute();

$historic = Connect::getInstance()->prepare(
	"UPDATE historic SET date = now() WHERE id_doc = '$id_doc' "
);
$historic->execute();

header("location:../");

die();