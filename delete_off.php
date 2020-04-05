<?php
session_start();
require_once('connect.php');

if (isset($_SESSION['client_id'])) {
	header('location:index.php');
  }

  if (isset($_GET['id'])) {
	$id=$_GET['id'];
  
	$q="SELECT * FROM `offre` WHERE id='$id'";
	$r=mysqli_query($dbc,$q);
	$num=mysqli_num_rows($r);
  
	if ($num!=1) {
	  header('location:index.php');
	}
	
  }else{
	header('location:index.php');
  }

  $q="UPDATE `offre` SET `archived`='1' WHERE `id`='$id'";
	$r=mysqli_query($dbc,$q);
	header('location:gestion_off.php?true');
	
?>