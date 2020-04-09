<?php
session_start();
require_once('connect.php');

if (isset($_SESSION['admin_id']) and $_SESSION['admin_id']==1) {
  


if (isset($_GET['id'])) {
  $get_id=$_GET['id'];
}else{
	header('location:gestion_admin.php?false');
}

  if($get_id!=1){
	$q="SELECT * FROM `admin` WHERE id='$get_id'";
  $r=mysqli_query($dbc,$q);
  $num=mysqli_num_rows($r);

  if ($num!=1) {
    header('location:gestion_admin.php?false');
  }
	  
	$q="UPDATE `admin` SET `archived`='1' WHERE `id`='$get_id'";
	$r=mysqli_query($dbc,$q);
	header('location:gestion_admin.php?true');
}else{
  header('location:gestion_admin.php?false');
}

}else{
  header('location:index.php');
}

?>