<?php
include_once 'connect.php';

if (isset($_POST['submit'])) {
  $email=$_POST['email'];
  $password=$_POST['password'];
  $password=md5($password);

  $q="SELECT * FROM `client` WHERE `email`='$email' and `password`='$password'";
  $r=mysqli_query($dbc,$q);

  $row=mysqli_fetch_assoc($r);

  $num=mysqli_num_rows($r);

  if ($num==1) {
    if ($row['isEmailConfirmed']==1) {
      $client_id=$row['id'];
    session_start();
    $_SESSION['client_id']=$row['id'];
    $_SESSION['cient_firstname']=$row['firstname'];
    $_SESSION['client_lastname']=$row['lastname'];
    $_SESSION['client_sexe']=$row['sexe'];
    $_SESSION['client_dn']=$row['dn'];
    $_SESSION['client_n_cni']=$row['n_cni'];
    $_SESSION['client_eta']=$row['eta'];
    $_SESSION['client_adr']=$row['adr'];
    $_SESSION['client_nv_etd']=$row['nv_etd'];
    $_SESSION['client_Specialite']=$row['Specialite'];
    $_SESSION['client_phone']=$row['phone'];
    $_SESSION['client_email']=$row['email'];
    $_SESSION['client_password']=$row['password'];
    $_SESSION['client_date']=$row['date'];
    header('location:profil_client.php?id='.$client_id);

    }else{
      $msg="L'email n'est pas activé";
    }
  }else{
    $msg="L'adresse E-mail ou mot de passe incorrect !";
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

  <title>S'identifier</title>

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
              <div class="col-lg-5 d-none d-lg-block" style="background-color: #4b79fd">
              </div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Bienvenue</h1>
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
                if (isset($_GET['success'])) {
                ?>
                <div class="alert alert-success">
                  <strong>Notification!</strong> Votre compte est activé, vous pouvez vous connecter
                </div>
                <?php
                }
                ?>
                  </div>
                  <form class="user" action="login_client.php" method="post">
                    <div class="form-group">
                      <input type="email" class="form-control form-control-user" placeholder="Adresse e-mail" name="email">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" placeholder="Mot de passe" name="password">
                    </div>
                    <input type="submit" name="submit" value="S'identifier" class="btn btn-user btn-block btn-primary">
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="forgot_client_pass.php">Mot de passe oublié?</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="register_admin.php">Créer un compte!</a>
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
