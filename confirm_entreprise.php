<?php
	include_once 'connect.php';

	if (!isset($_GET['email']) || !isset($_GET['token'])) {
		header('Location: register_entreprise.php');
	} else {
		$email = $_GET['email'];
		$token = $_GET['token'];

		$q="SELECT * FROM `entreprise` WHERE `email`='$email' and `token`='$token'";
  		$r=mysqli_query($dbc,$q);
		$num=mysqli_num_rows($r);
		
		if($num==1){
		
		$row=mysqli_fetch_assoc($r);
		$entreprise_id=$row['id'];

		$q0="UPDATE `entreprise` SET `isEmailConfirmed`=1 WHERE `id`='$entreprise_id'";
		$r0=mysqli_query($dbc,$q0);
		header('Location: login_entreprise.php?success');
		}else{
			header('Location: register_entreprise.php');
		}
	}
?>