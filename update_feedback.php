<?php
include_once 'connect.php';
session_start();

if (!isset($_SESSION['admin_id'])) {
    header('location:index.php');
  }else{
      $id=$_SESSION['admin_id'];
  }

  if (isset($_GET['id'])) {
    $get_id=$_GET['id'];
  
    $q="SELECT * FROM `feedback` WHERE id='$get_id'";
    $r=mysqli_query($dbc,$q);
    $num=mysqli_num_rows($r);
  
    if ($num!=1) {
      header('location:feedback.php');
    }
    
  }else{
    header('location:feedback.php');
  }

if (isset($_POST['submit'])) {
  $fullname=$_POST['fullname'];
  $job=$_POST['job'];
  $feedback=$_POST['feedback'];

  include 'feedback_upload_file.php';
    if(isset($file_name)){
        $q="UPDATE `feedback` SET `fullname`='$fullname',`job`='$job',`feedback`='$feedback',`img`='$file_name' WHERE id='$get_id'";
    }else{
        $q="UPDATE `feedback` SET `fullname`='$fullname',`job`='$job',`feedback`='$feedback' WHERE id='$get_id'";
    }
  

  $r=mysqli_query($dbc,$q);

  $msg="Commentaire modifiée avec succès";

  
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

  <title>Modifier des commentaires</title>

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
                <h1 class="h4 text-gray-900 mb-4">Modifier des commentaires</h1>
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
              $qs="SELECT * FROM `feedback` WHERE id='$id'";
              $rs=mysqli_query($dbc,$qs);
              $rows=mysqli_fetch_assoc($rs);
              ?>
              <form class="user" action="update_feedback.php?id=<?= $get_id ?>" method="post" enctype="multipart/form-data">
             
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <label>Nom complet</label>
                    <input type="text" class="form-control form-control-user" value="<?= $rows['fullname'] ?>" name="fullname" required>
                  </div>
                  <div class="col-sm-6">
                    <label>Poste</label>
                    <input type="text" class="form-control form-control-user" value="<?= $rows['job'] ?>" name="job" required>
                  </div>
                </div>
                <div class="form-group">
                    <label for="feedback">Feedback</label>
                    <textarea class="form-control" name="feedback" rows="3"><?= $rows['feedback'] ?></textarea>
                </div>
                <img src="<?= $rows['img'] ?>" class="mx-auto d-block img-thumbnail" width="50%">
                <div class="form-group">
                    <label for="exampleFormControlFile1">Photo de profil</label>
                    <input type="file" class="form-control-file" id="exampleFormControlFile1" name="fileToUpload">
                  </div>
                <input type="submit" name="submit" class="btn btn-user btn-block btn-success" value="Modifier">
              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="profil_admin.php?id=<?= $id ?>">Mon profil</a>
              </div>
              <div class="text-center">
                <a class="small" href="feedback.php">Clients satisfaits</a>
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
