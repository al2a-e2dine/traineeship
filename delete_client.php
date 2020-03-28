<?php
session_start();
require_once('connect.php');
if (isset($_GET['id'])) {
	$get_id=$_GET['id'];
	$q="UPDATE `client` SET `archived`='1' WHERE `id`='$get_id'";
	$r=mysqli_query($dbc,$q);
	header('location:gestion_client.php?true');
}else{
	header('location:gestion_client.php?false');
}
?>