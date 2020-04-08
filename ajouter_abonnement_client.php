<?php
include_once 'connect.php';
session_start();

if (isset($_SESSION['client_id'])) {
  $c_id=$_SESSION['client_id'];
}

if (isset($_POST['submit'])) {
  
  include 'upload_file.php';

  $q="INSERT INTO `abonnementclient`(`client_id`,`recu`) VALUES ('$c_id','$file_name')";
  $r=mysqli_query($dbc,$q);

if ($r) {
  $msg= "abonnement ajoutée";
}else{
  $msg= "abonnement non ajoutée";
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

  <title>Confirmer le paiement</title>

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
                <h1 class="h4 text-gray-900 mb-4">Confirmer le paiement</h1>
                <?php
                if (isset($msg)) {
                ?>
                <div class="alert alert-info">
                  <strong>Notification!</strong> <?= $msg ?>
                </div>
                <?php
                }
                ?>

                <?php
                if (isset($_GET['err_img_type'])) {
                ?>
                <div class="alert alert-danger">
                  <strong>Notification!</strong> Sorry, only JPG, JPEG, PNG & GIF files are allowed.
                </div>
                <?php
                }
                ?>
              </div>

              <div class="card bg-primary text-white">
                <div class="card-body">
                <h3>les informations de versement</h3>
                <hr>
                <h5><b>Nom Complet : </b> Belalia mohamed alaa eddine</h5>
                <h5><b>Adresse : </b> Zone12, Mascara</h5>
                <h5><b>Num CCP : </b> 12345670 89</h5>  
                </div>
              </div>

              <hr>

              <form action="ajouter_abonnement_client.php" method="post" enctype="multipart/form-data">
              <div class="form-group">
                    <label for="exampleFormControlFile1">Reçu de paiement</label>
                    <input type="file" class="form-control-file" id="exampleFormControlFile1" name="fileToUpload" required>
                  </div> 
                <!-- <input type="hidden" name="c_id" value="<?= $id ?>"> -->
                <input type="submit" name="submit" class="btn btn-user btn-block btn-primary" value="Confirmer le paiement">

              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="profil_client.php?id=<?= $c_id ?>">Mon profil</a>
              </div>
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