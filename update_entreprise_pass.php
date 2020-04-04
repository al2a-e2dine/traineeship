<?php
include_once 'connect.php';

session_start();

if (isset($_GET['id'])) {
  $id=$_GET['id'];

  $q="SELECT * FROM `entreprise` WHERE id='$id'";
  $r=mysqli_query($dbc,$q);
  $num=mysqli_num_rows($r);

  if ($num!=1) {
    header('location:index.php');
  }
  
}else{
  header('location:index.php');
}

if (isset($_SESSION['admin_id'])) {
  $admin_id=$_SESSION['admin_id'];
}elseif(isset($_SESSION['entreprise_id'])){
  $entreprise_id=$_SESSION['entreprise_id'];
  if($entreprise_id!=$id){
    header('location:index.php');
  }
}else{
  header('location:index.php');
}

if (isset($_POST['submit'])) {

$crr_password=$_POST['crr_password'];
$crr_password=md5($crr_password);

$password=$_POST['password'];
$cpassword=$_POST['cpassword'];

$e_id=$_POST['e_id'];

$q0="SELECT * FROM `entreprise` WHERE id='$c_id'";
$r0=mysqli_query($dbc,$q0);
$num0=mysqli_num_rows($r0);

if($num0==1){
    $row0=mysqli_fetch_assoc($r0);
    if($crr_password==$row0['password']){

        if ($password==$cpassword) {
            $password=md5($password);
      
              $q="UPDATE `entreprise` SET `password`='$password' WHERE id='$c_id'";
      
              $r=mysqli_query($dbc,$q);
      
              $msg="Le mot de passe a été modifié avec succès!";
      
          }else{
            $msg="Les deux mots de passe ne sont pas identiques !";
          }

    }else{
        $msg="Le mot de passe actuel est incorrect";
    }
}else{
    header('location:index.php');
}    
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Modifier le mot de pass</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block" style="background-color: #4b79fd">
          </div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Modifier le mot de pass</h1>
                <?php
                if (isset($msg)) {
                ?>
                <div class="alert alert-info">
                  <strong>Notification!</strong> <?= $msg ?>
                </div>
                <?php
                }
                ?>
              </div>
              <form class="user" action="update_entreprise_pass.php?id=<?= $id ?>" method="post">
                <div class="form-group">
                  <!-- <label>Mot de passe actuel</label> -->
                  <input type="password" class="form-control form-control-user" placeholder="Mot de passe actuel" name="crr_password" required>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <!-- <label>Mot de passe</label> -->
                    <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Mot de passe" name="password" required>
                  </div>
                  <div class="col-sm-6">
                    <!-- <label>Répéter le mot de passe</label> -->
                    <input type="password" class="form-control form-control-user" placeholder="Répéter le mot de passe" name="cpassword" required>
                  </div>
                </div>
                <input type="hidden" name="c_id" value="<?= $id ?>">
                <input type="submit" name="submit" class="btn btn-user btn-block btn-success" value="Modifier">
              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="profil_admin.php?id=<?= $id ?>">Retour au compte personnel</a>
              </div>
              <?php
              if(isset($_SESSION['admin_id'])){
              ?>
              <div class="text-center">
                <a class="small" href="gestion_entreprise.php">Gestion des entreprises</a>
              </div>
              <?php
              }
              ?>
              <div class="text-center">
                <a class="small" href="index.php">Page d'accueil</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
