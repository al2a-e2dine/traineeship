<?php
include_once 'connect.php';
session_start();

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

  if($numz!=1){
    header('location:index.php');
  }

if (isset($_POST['submit'])) {
  $title=$_POST['title'];
  $dt=$_POST['dt'];
  $n_places=$_POST['n_places'];
  $nature_offre=$_POST['nature_offre'];
  $Specialite=$_POST['Specialite'];

  $off_id=$_POST['off_id'];

  include 'upload_file.php';

        if(isset($file_name)){
            //echo "1";exit();
            $q="UPDATE `offre` SET `title`='$title',`dt`='$dt',`n_places`='$n_places',`nature_offre`='$nature_offre',`Specialite`='$Specialite',`img`='$file_name' WHERE id='$off_id'";
        }else{
            $q="UPDATE `offre` SET `title`='$title',`dt`='$dt',`n_places`='$n_places',`nature_offre`='$nature_offre',`Specialite`='$Specialite' WHERE id='$off_id'";
            //echo "2";exit();
        }

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

  <title>Modifier un offre d'emploi</title>

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
                <h1 class="h4 text-gray-900 mb-4">Modifier un offre d'emploi</h1>
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
              <?php
              $q="SELECT * FROM `offre` WHERE id='$id'";
              $r=mysqli_query($dbc,$q);
              $row=mysqli_fetch_assoc($r);
              ?>
              <form class="user" action="update_off.php?id=<?= $id ?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <!-- <label>Titre</label> -->
                  <input type="text" class="form-control form-control-user" value="<?= $row['title'] ?>" name="title" required>
                </div>
                <div class="form-group">
                    <label for="dt">Détaille</label>
                    <textarea class="form-control" rows="3" name="dt"><?= $row['dt'] ?></textarea>
                </div>
                <div class="form-group">
                  <!-- <label>Nombre de places</label> -->
                  <input type="number" class="form-control form-control-user" value="<?= $row['n_places'] ?>" name="n_places" required>
                </div>
                <div class="form-group">
                  <!-- <label>La nature du offre</label> -->
                  <input type="text" class="form-control form-control-user" value="<?= $row['nature_offre'] ?>" name="nature_offre" required>
                </div>
                <div class="form-group">
                  <label for="sel1">Specialite</label>
                  <select class="form-control" id="sel1" name="Specialite" required>
                    <option value="<?= $row['Specialite'] ?>"><?= $row['Specialite'] ?></option>
                    <option value="s1">Specialite 1</option>
                    <option value="s2">Specialite 2</option>
                    <option value="s3">Specialite 3</option>
                    <option value="s4">Specialite 4</option>
                    <option value="s5">Specialite 5</option>
                    <option value="s6">Specialite 6</option>
                  </select>
                </div>
                <img src="<?= $row['img'] ?>" class="mx-auto d-block img-thumbnail" width="50%">
                <div class="form-group">
                    <label for="exampleFormControlFile1">Photo</label>
                    <input type="file" class="form-control-file" id="exampleFormControlFile1" name="fileToUpload">
                  </div> 
                <input type="hidden" name="off_id" value="<?= $id ?>">
                <input type="submit" name="submit" class="btn btn-user btn-block btn-primary" value="Modifier un offre d'emploi">
              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="gestion_off.php?id=<?= $ent_id ?>">Gestion des offre d'emploi</a>
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
