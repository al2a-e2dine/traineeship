<?php
include_once 'connect.php';
session_start();

if (!isset($_SESSION['entreprise_id'])) {
  header('location:index.php');
}

$ent_id=$_SESSION['entreprise_id'];

if (isset($_POST['submit'])) {
  $title=$_POST['title'];
  $dt=$_POST['dt'];
  $n_places=$_POST['n_places'];
  $nature_offre=$_POST['nature_offre'];
  $Specialite=$_POST['Specialite'];

  include 'upload_file.php';

        $q="INSERT INTO `offre`(`id_entreprise`, `title`, `dt`, `n_places`, `nature_offre`, `Specialite`, `img`) VALUES ('$ent_id', '$title', '$dt', '$n_places', '$nature_offre', '$Specialite', '$file_name')";

        $r=mysqli_query($dbc,$q);

        $msg="L'offre d'emploi a été ajoutée avec succès";

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

  <title>Ajouter un offre d'emploi</title>

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
                <h1 class="h4 text-gray-900 mb-4">Ajouter un offre d'emploi</h1>
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
              </div>
              <form class="user" action="add_off.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <!-- <label>Titre</label> -->
                  <input type="text" class="form-control form-control-user" placeholder="Titre" name="title" required>
                </div>
                <div class="form-group">
                    <label for="dt">Détaille</label>
                    <textarea class="form-control" rows="3" name="dt"></textarea>
                </div>
                <div class="form-group">
                  <!-- <label>Nombre de places</label> -->
                  <input type="number" class="form-control form-control-user" placeholder="Nombre de places" name="n_places" required>
                </div>
                <div class="form-group">
                  <!-- <label>La nature du offre</label> -->
                  <input type="text" class="form-control form-control-user" placeholder="La nature du offre" name="nature_offre" required>
                </div>
                <div class="form-group">
                  <label for="sel1">Specialite</label>
                  <select class="form-control" id="sel1" name="Specialite" required>
                    <option></option>
                    <option value="s1">Specialite 1</option>
                    <option value="s2">Specialite 2</option>
                    <option value="s3">Specialite 3</option>
                    <option value="s4">Specialite 4</option>
                    <option value="s5">Specialite 5</option>
                    <option value="s6">Specialite 6</option>
                  </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlFile1">Photo</label>
                    <input type="file" class="form-control-file" id="exampleFormControlFile1" name="fileToUpload" required>
                  </div> 
                
                <input type="submit" name="submit" class="btn btn-user btn-block btn-primary" value="Ajouter un offre d'emploi">
              </form>
              <hr>
                <div class="text-center">
                <a class="small" href="gestion_off.php">Gestion des offre d'emploi</a>
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
