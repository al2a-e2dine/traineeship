<?php
	include_once 'connect.php';

	if (!isset($_GET['email']) || !isset($_GET['token'])) {
		header('Location: register_admin.php');
	} else {
		$email = $_GET['email'];
		$token = $_GET['token'];

		$q="SELECT * FROM `admin` WHERE `email`='$email' and `token`='$token'";
  		$r=mysqli_query($dbc,$q);
		$num=mysqli_num_rows($r);
		
		if($num==1){
		
		$row=mysqli_fetch_assoc($r);
		$admin_id=$row['id'];

		$q0="UPDATE `admin` SET `isEmailConfirmed`=1 WHERE `id`='$admin_id'";
		$r0=mysqli_query($dbc,$q0);
		header('Location: login_admin.php?success');
		}else{
			header('Location: register_admin.php');
		}
	}
?>