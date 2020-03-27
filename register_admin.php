<?php
include_once 'connect.php';

if (isset($_POST['submit'])) {
  $firstname=$_POST['firstname'];
  $lastname=$_POST['lastname'];
  $n_cni=$_POST['n_cni'];
  $adr=$_POST['adr'];
  $phone=$_POST['phone'];
  $email=$_POST['email'];
  $password=$_POST['password'];
  $cpassword=$_POST['cpassword'];

  $q="SELECT * FROM `admin` WHERE `email`='$email'";
  $r=mysqli_query($dbc,$q);
  $num=mysqli_num_rows($r);

  if ($num==0) {
      if ($password==$cpassword) {
      $password=md5($password);

      $token = 'qwertzuiopasdfghjklyxcvbnmQWERTZUIOPASDFGHJKLYXCVBNM0123456789!$/()*';
			$token = str_shuffle($token);
      $token = substr($token, 0, 10);

      $message="
      Veuillez cliquer sur le lien ci-dessous:
      http://localhost/traineeship/confirm_admin.php?email=$email&token=$token
      ";

      if(mail($email,"Veuillez vérifier l'e-mail!",$message)){

        $q="INSERT INTO `admin`(`firstname`, `lastname`, `n_cni`, `adr`, `phone`, `email`, `password`, `token`) VALUES ('$firstname', '$lastname', '$n_cni', '$adr', '$phone', '$email', '$password', '$token')";

        $r=mysqli_query($dbc,$q);

        $msg="Vous avez été enregistré! Veuillez vérifier votre email!";

        }else{
          $msg="Quelque chose s'est mal passé! Veuillez réessayer!";
        }

    }else{
      $msg="Les deux mots de passe ne sont pas identiques !";
    }
  }else{
    $msg="Cette adresse e-mail est déja utilisée !";
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
                <h1 class="h4 text-gray-900 mb-4">Ajouter un administrateur</h1>
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
              <form class="user" action="register_admin.php" method="post">
              <div class="form-group">
                  <label for="sel1">Genre</label>
                  <select class="form-control" id="sel1" name="sexe" required>
                    <option></option>
                    <option value="Homme">Homme</option>
                    <option value="Femme">Femme</option>
                  </select>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <!-- <label>Nom</label> -->
                    <input type="text" class="form-control form-control-user" placeholder="Nom" name="firstname" required>
                  </div>
                  <div class="col-sm-6">
                    <!-- <label>Prénom</label> -->
                    <input type="text" class="form-control form-control-user" placeholder="Prénom" name="lastname" required>
                  </div>
                </div>
                <div class="form-group">
                  <!-- <label>Numéro CNI</label> -->
                  <input type="number" class="form-control form-control-user" placeholder="Numéro CNI" name="n_cni" required>
                </div>
                <div class="form-group">
                  <!-- <label>Adresse postale</label> -->
                  <input type="text" class="form-control form-control-user" placeholder="Adresse postale" name="adr" required>
                </div>
                <div class="form-group">
                  <!-- <label>Numéro de téléphone</label> -->
                  <input type="number" class="form-control form-control-user" placeholder="Numéro de téléphone" name="phone" required>
                </div>
                <div class="form-group">
                  <!-- <label>Adresse e-mail</label> -->
                  <input type="email" class="form-control form-control-user" placeholder="Adresse e-mail" name="email" required>
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
                <input type="submit" name="submit" class="btn btn-user btn-block btn-primary" value="Créer un compte">
              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="login_admin.php">Vous avez déjà un compte? S'identifier!</a>
              </div>
              <div class="text-center">
                <a class="small" href="gestion_admin.php">Gestion des administrateurs</a>
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
