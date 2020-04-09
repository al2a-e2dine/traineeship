<?php
session_start();
require_once('connect.php');

if (!isset($_SESSION['entreprise_id'])) {
    header('location:index.php');
  }

  $ent_id=$_SESSION['entreprise_id'];

if (isset($_GET['id'])) {
    $id=$_GET['id'];
  }

  $qz="SELECT * FROM `offre` WHERE `id_entreprise`='$ent_id' and `id`='$id'";
  $rz=mysqli_query($dbc,$qz);
  $numz=mysqli_num_rows($rz);
  //echo $numz; exit();

  if($numz==1){
    $q="UPDATE `offre` SET `archived`='1' WHERE `id_entreprise`='$ent_id' and `id`='$id'";
	$r=mysqli_query($dbc,$q);
	header('location:gestion_off.php?true');
  }else{
    header('location:gestion_off.php?false');
  }

  
	// $q="SELECT * FROM `offre` WHERE id='$id'";
	// $r=mysqli_query($dbc,$q);
	// $num=mysqli_num_rows($r);
  
	// if ($num!=1) {
	//   header('location:index.php');
	// }
	

  
	
?>