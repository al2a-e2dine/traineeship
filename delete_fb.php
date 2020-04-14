<?php
session_start();
require_once('connect.php');

if (!isset($_SESSION['admin_id'])) {
	header('location:index.php');
  }

  if (isset($_GET['id'])) {
	$id=$_GET['id'];
  
	$q="SELECT * FROM `feedback` WHERE id='$id'";
	$r=mysqli_query($dbc,$q);
	$num=mysqli_num_rows($r);
  
	if ($num!=1) {
	  header('location:feedback.php');
	}
	
  }else{
	header('location:feedback.php');
  }

  $q="UPDATE `feedback` SET `archived`='1' WHERE `id`='$id'";
	$r=mysqli_query($dbc,$q);
	header('location:feedback.php?true');
	
?>