<?php
include_once 'connect.php';

session_start();

if (isset($_GET['id'])) {
  $id=$_GET['id'];

  $q="SELECT * FROM `client` WHERE id='$id'";
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
}elseif(isset($_SESSION['client_id'])){
  $client_id=$_SESSION['client_id'];
  if($client_id!=$id){
    header('location:index.php');
  }
}else{
  header('location:index.php');
}


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
      $c_id=$_POST['c_id'];
    
            $q="UPDATE `client` SET `firstname`='$firstname',`lastname`='$lastname',`sexe`='$sexe',`dn`='$dn',`n_cni`='$n_cni',`eta`='$eta',`adr`='$adr',`nv_etd`='$nv_etd',`Specialite`='$Specialite',`phone`='$phone'  WHERE id='$c_id'";
    
            $r=mysqli_query($dbc,$q);
    
            $msg="Les informations ont été modifiées avec succès!";
    
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

  <title>Modifier un client</title>

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
                <h1 class="h4 text-gray-900 mb-4">Modifier un client</h1>
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
              $qs="SELECT * FROM `client` WHERE id='$id'";
              $rs=mysqli_query($dbc,$qs);
              $rows=mysqli_fetch_assoc($rs);
              ?>
              <form class="user" action="update_client.php?id=<?= $id ?>" method="post">
              
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <label>Nom</label>
                    <input type="text" class="form-control form-control-user" value="<?= $rows['firstname'] ?>" name="firstname" required>
                  </div>
                  <div class="col-sm-6">
                    <label>Prénom</label>
                    <input type="text" class="form-control form-control-user" value="<?= $rows['lastname'] ?>" name="lastname" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="sel1">Genre</label>
                  <select class="form-control" id="sel1" name="sexe">
                    <option value="<?= $rows['sexe'] ?>"><?= $rows['sexe'] ?></option>
                    <option value="Homme">Homme</option>
                    <option value="Femme">Femme</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Date de naissance</label>
                  <input type="date" class="form-control form-control-user" value="<?= $rows['dn'] ?>" name="dn" required>
                </div>
                <div class="form-group">
                  <label>Numéro CNI</label>
                  <input type="number" class="form-control form-control-user" value="<?= $rows['n_cni'] ?>" name="n_cni" required>
                </div>
                <div class="form-group">
                  <label>Etablissement</label>
                  <input type="text" class="form-control form-control-user" value="<?= $rows['eta'] ?>" name="eta" required>
                </div>
                <div class="form-group">
                  <label>Adresse postale</label>
                  <input type="text" class="form-control form-control-user" value="<?= $rows['adr'] ?>" name="adr" required>
                </div>
                <div class="form-group">
                  <label>Niveau d’étude</label>
                  <input type="text" class="form-control form-control-user" value="<?= $rows['nv_etd'] ?>" name="nv_etd" required>
                </div>
                
                <div class="form-group">
                  <label for="sel1">Specialite</label>
                  <select class="form-control" id="sel1" name="Specialite" required>
                    <option value="<?= $rows['Specialite'] ?>"><?= $rows['Specialite'] ?></option>
                    <option value="s1">Specialite 1</option>
                    <option value="s2">Specialite 2</option>
                    <option value="s3">Specialite 3</option>
                    <option value="s4">Specialite 4</option>
                    <option value="s5">Specialite 5</option>
                    <option value="s6">Specialite 6</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Numéro de téléphone</label>
                  <input type="number" class="form-control form-control-user" value="<?= $rows['phone'] ?>" name="phone" required>
                </div>

                <input type="hidden" name="c_id" value="<?= $id ?>">
                <input type="submit" name="submit" class="btn btn-user btn-block btn-success" value="Modifier">
              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="update_client_pass.php?id=<?= $id ?>">Modifier le mot de pass</a>
              </div>
              <div class="text-center">
                <a class="small" href="profil_client.php?id=<?= $id ?>">Retour au compte personnel</a>
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
