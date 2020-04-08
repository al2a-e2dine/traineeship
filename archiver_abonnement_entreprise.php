<?php
session_start();
require_once('connect.php');

if (!isset($_SESSION['admin_id'])) {
	header('location:index.php');
  }

  if (isset($_GET['id'])) {
	$id=$_GET['id'];
  
	$q="SELECT * FROM `abonnemententreprise` WHERE id='$id'";
	$r=mysqli_query($dbc,$q);
	$num=mysqli_num_rows($r);
  
	if ($num!=1) {
	  header('location:index.php');
	}
	
  }else{
	header('location:index.php');
  }

  $q="UPDATE `abonnemententreprise` SET `archived`='1' WHERE `id`='$id'";
	$r=mysqli_query($dbc,$q);
	header('location:abonnement_entreprise.php?true');
	
?>