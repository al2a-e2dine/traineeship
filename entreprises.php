<?php
include_once 'connect.php';
session_start();

// determine which page number visitor is currently on
if (!isset($_GET['page'])) {
	$page = 1;
  } else {
	$page = $_GET['page'];
  }

  // define how many results you want per page
$results_per_page = 8;

// find out the number of results stored in database
$sql='SELECT * FROM entreprise';
$result = mysqli_query($dbc, $sql);
$number_of_results = mysqli_num_rows($result);

// determine number of total pages available
$number_of_pages = ceil($number_of_results/$results_per_page);

// determine the sql LIMIT starting number for the results on the displaying page
$this_page_first_result = ($page-1)*$results_per_page;
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Entreprises</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <?php
    include 'css2.html';
  ?>
    
  </head>
  <body>
    
	  <!-- <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container-fluid px-md-4	">
	      <a class="navbar-brand" href="index.html">Skillhunt</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item"><a href="index.html" class="nav-link">Home</a></li>
	          <li class="nav-item"><a href="browsejobs.html" class="nav-link">Browse Jobs</a></li>
	          <li class="nav-item"><a href="candidates.html" class="nav-link">Canditates</a></li>
	          <li class="nav-item active"><a href="blog.html" class="nav-link">Blog</a></li>
	          <li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li>
	          <li class="nav-item cta mr-md-1"><a href="new-post.html" class="nav-link">Post a Job</a></li>
	          <li class="nav-item cta cta-colored"><a href="job-post.html" class="nav-link">Want a Job</a></li>

	        </ul>
	      </div>
	    </div>
    </nav> -->
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container-fluid px-md-4	">
	      <a class="navbar-brand" href="index.php">Traineeship</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item active"><a href="index.php" class="nav-link">Page d'accueil</a></li>
	          <li class="nav-item"><a href="offres.php" class="nav-link">Les offres d'emploi</a></li>
	          <li class="nav-item"><a href="entreprises.php" class="nav-link">Entreprises</a></li>
	          
			  <?php
			  if(isset($_SESSION['admin_id'])){
				?>
					<li class="nav-item btn btn-success mr-md-1"><a href="profil_admin.php?id=<?= $_SESSION['admin_id'] ?>" class="nav-link"><?= $_SESSION['admin_firstname']." ".$_SESSION['admin_lastname'] ?></a></li>
			  <li class="nav-item btn btn-danger"><a href="logout.php" class="nav-link">Se déconnecter</a></li>
			  
				<?php }elseif(isset($_SESSION['client_id'])){ ?>
				
					<li class="nav-item btn btn-success mr-md-1"><a href="profil_client.php?id=<?= $_SESSION['client_id'] ?>" class="nav-link"><?= $_SESSION['client_firstname']." ".$_SESSION['client_lastname'] ?></a></li>
			  <li class="nav-item btn btn-danger"><a href="logout.php" class="nav-link">Se déconnecter</a></li>
			  
			  <?php }elseif(isset($_SESSION['entreprise_id'])){ ?>
				<li class="nav-item btn btn-success mr-md-1"><a href="profil_entreprise.php?id=<?= $_SESSION['entreprise_id'] ?>" class="nav-link"><?= $_SESSION['entreprise_denomination'] ?></a></li>
			  <li class="nav-item btn btn-danger"><a href="logout.php" class="nav-link">Se déconnecter</a></li>
			  <?php }else{ ?>
			  
			  
			  <li>
			  <div class="dropdown">
				<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
				Register
				</button>
				<div class="dropdown-menu">
				<a class="dropdown-item" href="register_admin.php">Admin</a>
				<a class="dropdown-item" href="register_client.php">Client</a>
				<a class="dropdown-item" href="register_entreprise.php">Entreprise</a>
				</div>
			</div>
			  </li>
			  <li>.</li>
			  <li>
			  <div class="dropdown">
				<button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
				Login
				</button>
				<div class="dropdown-menu">
				<a class="dropdown-item" href="login_admin.php">Admin</a>
				<a class="dropdown-item" href="login_client.php">Client</a>
				<a class="dropdown-item" href="login_entreprise.php">Entreprise</a>
				</div>
			</div>
			  </li>
			  <?php } ?>
	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->
    
    <div class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-start">
          <div class="col-md-12 ftco-animate text-center mb-5">
          	<!-- <p class="breadcrumbs mb-0"><span class="mr-3"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Blog</span></p> -->
            <h1 class="mb-3 bread">Entreprises</h1>
          </div>
        </div>
      </div>
    </div>

		<section class="ftco-section">
      <div class="container">
      <div class="row">
               <?php
                  $q3='SELECT * FROM `entreprise` where archived=0 LIMIT ' . $this_page_first_result . ',' .  $results_per_page;
                  
								  $r3=mysqli_query($dbc,$q3);
								  while($row3=mysqli_fetch_assoc($r3)){
									  
								?>
                <div class="col-md-3">
                  <a href="profil_entreprise.php?id=<?= $row3['id'] ?>">
                    <img src="<?= $row3['img'] ?>" class="img-fluid img-thumbnail">
                    <h5 class="text-center"><?= $row3['denomination'] ?></h5>
                  </a>
                </div>
          <?php } ?>
        </div>
        <div class="row mt-5">
          <div class="col text-center">
            <div class="block-27">
              <ul>
                <!-- <li class="active"><span>1</span></li> -->
                <?php 
                  // display the links to the pages
                for ($page=1;$page<=$number_of_pages;$page++) { ?>
                <li><a href="offres.php?page=<?= $page ?>"><?= $page ?></a></li>
                <?php } ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>
		
		<section class="ftco-section-parallax">
      <div class="parallax-img d-flex align-items-center">
        <div class="container">
          <div class="row d-flex justify-content-center">
            <div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
              <h2>Subcribe to our Newsletter</h2>
              <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in</p>
              <div class="row d-flex justify-content-center mt-4 mb-4">
                <div class="col-md-12">
                  <form action="#" class="subscribe-form">
                    <div class="form-group d-flex">
                      <input type="text" class="form-control" placeholder="Enter email address">
                      <input type="submit" value="Subscribe" class="submit px-3">
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <?php
    include 'footer_index.html';
  ?>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <?php
    include 'xjs.html';
  ?>
    
  </body>
</html>