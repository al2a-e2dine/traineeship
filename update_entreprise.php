<?php
include_once 'connect.php';

session_start();

if (isset($_GET['id'])) {
  $id=$_GET['id'];

  $q="SELECT * FROM `entreprise` WHERE id='$id'";
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
}elseif(isset($_SESSION['entreprise_id'])){
  $entreprise_id=$_SESSION['entreprise_id'];
  if($entreprise_id!=$id){
    header('location:index.php');
  }
}else{
  header('location:index.php');
}

      if (isset($_POST['submit'])) {
        $type=$_POST['type'];
        $n_serie=$_POST['n_serie'];
        $denomination=$_POST['denomination'];
        $nom_dirigeant=$_POST['nom_dirigeant'];
        $phone=$_POST['phone'];
        $siege_social=$_POST['siege_social'];
        $description=$_POST['description'];
        $secteur_act=$_POST['secteur_act'];
        $e_id=$_POST['e_id'];
    
            $q="UPDATE `entreprise` SET `type`='$type',`n_serie`='$n_serie',`denomination`='$denomination',`nom_dirigeant`='$nom_dirigeant',`siege_social`='$siege_social',`phone`='$phone', `description`='$description',`secteur_act`='$secteur_act' WHERE id='$e_id'";
    
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

  <title>Modifier une entreprise</title>

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
                <h1 class="h4 text-gray-900 mb-4">Modifier une entreprise</h1>
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
              $qs="SELECT * FROM `entreprise` WHERE id='$id'";
              $rs=mysqli_query($dbc,$qs);
              $rows=mysqli_fetch_assoc($rs);
              ?>
              <form class="user" action="update_entreprise.php?id=<?= $id ?>" method="post">
              <div class="form-group">
                  <label for="sel1">Type d'entreprise </label>
                  <select class="form-control"  id="sel1" name="type" required>
                    <option value="<?= $rows['type'] ?>"><?= $rows['type'] ?></option>
                    <option value="Grande/Moyenne Entreprise">Grande/Moyenne Entreprise </option>
                    <option value="Petite Entreprise">Petite Entreprise</option>
                  </select>                                    
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <label>Numero de serie</label>
                    <input type="number" class="form-control form-control-user" value="<?= $rows['n_serie'] ?>" name="n_serie" required>
                  </div>
                  <div class="col-sm-6">
                    <label>Denomination</label>
                    <input type="text" class="form-control form-control-user" value="<?= $rows['denomination'] ?>" name="denomination" required>
                  </div>
                </div>
                <div class="form-group">
                  <label>Nom du derigeant</label>
                  <input type="text" class="form-control form-control-user" value="<?= $rows['nom_dirigeant'] ?>" name="nom_dirigeant" required>
                </div>
                <div class="form-group">
                  <label>Numéro de téléphone</label>
                  <input type="number" class="form-control form-control-user" value="<?= $rows['phone'] ?>" name="phone" required>
                </div>
                <div class="form-group">
                  <label>Siege social</label>
                  <input type="text" class="form-control form-control-user" value="<?= $rows['siege_social'] ?>" name="siege_social" required>
                </div>
                <div class="form-group">
                  <label>Description</label>
                  <textarea class="form-control" name="description" rows="3" required><?= $rows['description'] ?></textarea>
                </div>
                <div class="form-group">
                    <label>Secteur d'activité</label>
                    <input type="text" class="form-control form-control-user" value="<?= $rows['secteur_act'] ?>" name="secteur_act" required>
                  </div>

                <input type="hidden" name="e_id" value="<?= $id ?>">
                <input type="submit" name="submit" class="btn btn-user btn-block btn-success" value="Modifier">
              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="update_entreprise_pass.php?id=<?= $id ?>">Modifier le mot de pass</a>
              </div>
              <div class="text-center">
                <a class="small" href="profil_entreprise.php?id=<?= $id ?>">Retour au compte personnel</a>
              </div>
              <?php
              if(isset($_SESSION['admin_id'])){
              ?>
              <div class="text-center">
                <a class="small" href="gestion_entreprise.php">Gestion des entreprises</a>
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
