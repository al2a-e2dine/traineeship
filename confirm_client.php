<?php
	include_once 'connect.php';
	session_start();

if(isset($_SESSION['client_id']) || isset($_SESSION['entreprise_id'])){
  header('location:index.php');
}

	if (!isset($_GET['email']) || !isset($_GET['token'])) {
		header('Location: register_client.php');
	} else {
		$email = $_GET['email'];
		$token = $_GET['token'];

		$q="SELECT * FROM `client` WHERE `email`='$email' and `token`='$token'";
  		$r=mysqli_query($dbc,$q);
		$num=mysqli_num_rows($r);
		
		if($num==1){
		
		$row=mysqli_fetch_assoc($r);
		$client_id=$row['id'];

		$q0="UPDATE `client` SET `isEmailConfirmed`=1 WHERE `id`='$client_id'";
		$r0=mysqli_query($dbc,$q0);
		header('Location: login_client.php?success');
		}else{
			header('Location: register_client.php');
		}
	}
?>