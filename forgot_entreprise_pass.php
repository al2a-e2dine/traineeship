<?php
include_once 'connect.php';

if (isset($_POST['submit'])) {
  $email=$_POST['email'];

  $q="SELECT * FROM `entreprise` WHERE `email`='$email' and `isEmailConfirmed`=1";
  $r=mysqli_query($dbc,$q);
  $num=mysqli_num_rows($r);

  if($num==1){
    $row=mysqli_fetch_assoc($r);
    $id=$row['id'];

    $message="
      Veuillez cliquer sur le lien ci-dessous:
      http://localhost/traineeship/update_entreprise_fgpass.php?id=".$id;

      if(mail($email,"Réinitialiser le mot de passe!",$message)){
        
        $msg="Vérifiez votre email pour changer votre mot de passe!";

        }else{
          $msg="Quelque chose s'est mal passé! Veuillez réessayer!";
        }

  }else{
    $msg="Ce compte n'est pas activé!";
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

  <title>Mot de passe oublié?</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block" style="background-color: #4b79fd"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-2">Mot de passe oublié?</h1>
                    <p class="mb-4">Nous l'obtenons, des choses arrivent. Entrez simplement votre adresse e-mail ci-dessous et nous vous enverrons un lien pour réinitialiser votre mot de passe!</p>
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
                  <form class="user" action="forgot_entreprise_pass.php" method="post">
                    <div class="form-group">
                      <input type="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Adresse e-mail" name="email">
                    </div>
                    <input type="submit" name="submit" class="btn btn-user btn-block btn-primary" value="réinitialiser le mot de passe">
                  </form>
                  <hr>
                  <div class="text-center">
                <a class="small" href="login_entreprise.php">Vous avez déjà un compte? S'identifier!</a>
              </div>
                  <div class="text-center">
                    <a class="small" href="register_entreprise.php">Créer un compte!</a>
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
