<?php
session_start();
require_once('connect.php');

if (!isset($_SESSION['admin_id'])) {
	header('location:index.php');
  }

  if (isset($_GET['id'])) {
	$id=$_GET['id'];
  
	$q="SELECT * FROM `abonnementclient` WHERE id='$id'";
	$r=mysqli_query($dbc,$q);
	$num=mysqli_num_rows($r);
  
	if ($num!=1) {
	  header('location:index.php');
	}
	
  }else{
	header('location:index.php');
  }
  $date_d=date("Y-m-d");
  $date_f = date('Y-m-d',strtotime(date("Y-m-d", mktime()) . " + 365 day"));
  $q="UPDATE `abonnementclient` SET `valider`='1' , `date_db`='$date_d' , `date_fin`='$date_f' WHERE `id`='$id'";
	$r=mysqli_query($dbc,$q);
	header('location:gestion_abonnement_client.php?true');
	
?>