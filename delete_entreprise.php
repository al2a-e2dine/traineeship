<?php
session_start();
require_once('connect.php');
if (isset($_GET['id'])) {
	$get_id=$_GET['id'];
	$q="UPDATE `entreprise` SET `archived`='1' WHERE `id`='$get_id'";
	$r=mysqli_query($dbc,$q);
	header('location:gestion_entreprise.php?true');
}else{
	header('location:gestion_entreprise.php?false');
}
?>