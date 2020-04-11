<?php
include_once 'connect.php';
session_start();

/*if(isset($_SESSION['client_id'])){
  header('location:index.php');
}*/

$c_id=$_SESSION['client_id'];

if (isset($_POST['submit'])) {
    $id=$_GET['off_id'];
  include 'upload_cv.php';

  $q="INSERT INTO `demandeoffre`(`client_id`, `offre_id`, `cv`, `lettre`) VALUES ('$c_id','$id','$file_name','$file_name2')";
  $r=mysqli_query($dbc,$q);

if ($r) {
  $msg= "offre demandé";
}else{
  $msg= "offre non demandé";
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

  <title>S'inscrire</title>

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
                <h1 class="h4 text-gray-900 mb-4">Demander un offre</h1>
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
              <form class="user" action="dmd_off.php" method="post" enctype="multipart/form-data">
             
              <div class="form-group">
                    <label for="exampleFormControlFile1">CV</label>
                    <input type="file" class="form-control-file" id="exampleFormControlFile1" name="fileToUpload" required>
              </div>   

              <div class="form-group">
                    <label for="exampleFormControlFile1">Lettre de motivation</label>
                    <input type="file" class="form-control-file" id="exampleFormControlFile1" name="fileToUpload" required>
              </div> 

                                  
                <input type="submit" name="submit" class="btn btn-user btn-block btn-primary" value="Postuler">
              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="login_client.php">Vous avez déjà un compte? S'identifier!</a>
              </div>
              <?php
              if(isset($_SESSION['admin_id'])){
              ?>
              <div class="text-center">
                <a class="small" href="gestion_client.php">Gestion des clients</a>
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
