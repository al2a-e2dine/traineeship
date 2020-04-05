<?php
include_once 'connect.php';
session_start();

if (isset($_POST['submit'])) {
  $firstname=$_POST['firstname'];
  $lastname=$_POST['lastname'];
  $sexe=$_POST['sexe'];
  $dn=$_POST['dn'];
  $n_cni=$_POST['n_cni'];
  $eta=$_POST['eta'];
  $adr=$_POST['adr'];
  $nv_etd=$_POST['nv_etd'];
  $Specialite=$_POST['Specialite'];
  $phone=$_POST['phone'];
  $email=$_POST['email'];
  $password=$_POST['password'];
  $cpassword=$_POST['cpassword'];

  $q="SELECT * FROM `client` WHERE `email`='$email'";
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
      http://localhost/traineeship/confirm_client.php?email=$email&token=$token
      ";

      if(mail($email,"Veuillez vérifier l'e-mail!",$message)){

        $q="INSERT INTO `client`(`firstname`, `lastname`, `sexe`, `dn`, `n_cni`, `eta`, `adr`, `nv_etd`, `Specialite`, `phone`, `email`, `password`, `token`) VALUES ('$firstname','$lastname','$sexe','$dn','$n_cni','$eta','$adr','$nv_etd','$Specialite','$phone','$email','$password','$token')";

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
                <h1 class="h4 text-gray-900 mb-4">Ajouter un client</h1>
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
              <form class="user" action="register_client.php" method="post">
             
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
                  <label for="sel1">Genre</label>
                  <select class="form-control" id="sel1" name="sexe" required>
                    <option></option>
                    <option value="Homme">Homme</option>
                    <option value="Femme">Femme</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Date de naissance</label>
                  <input type="date" class="form-control form-control-user" placeholder="Date de naissance" name="dn" required>
                </div>
                <div class="form-group">
                  <!-- <label>Numéro CNI</label> -->
                  <input type="number" class="form-control form-control-user" placeholder="Numéro CNI" name="n_cni" required>
                </div>
                <div class="form-group">
                  <!-- <label>Etablissement</label> -->
                  <input type="text" class="form-control form-control-user" placeholder="Etablissement" name="eta" required>
                </div>
                <div class="form-group">
                  <!-- <label>Adresse postale</label> -->
                  <input type="text" class="form-control form-control-user" placeholder="Adresse postale" name="adr" required>
                </div>
                <div class="form-group">
                  <!-- <label>Niveau d’étude</label> -->
                  <input type="text" class="form-control form-control-user" placeholder="Niveau d’étude" name="nv_etd" required>
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
                  <!-- <label>Numéro de téléphone</label> -->
                  <input type="number" class="form-control form-control-user" placeholder="phone" name="phone" required>
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
