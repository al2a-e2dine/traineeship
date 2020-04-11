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
$sql='SELECT * FROM offre';
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
    <title>Skillhunt - Free Bootstrap 4 Template by Colorlib</title>
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
            <h1 class="mb-3 bread">Offres d'emploi</h1>
          </div>
        </div>
      </div>
    </div>

		<section class="ftco-section">
      <div class="container">
        <div class="row d-flex">
               <?php
                  $q3='SELECT * FROM `offre` where archived=0 LIMIT ' . $this_page_first_result . ',' .  $results_per_page;
                  
								  $r3=mysqli_query($dbc,$q3);
								  while($row3=mysqli_fetch_assoc($r3)){
									  $e_id=$row3['id_entreprise'];

									$q="SELECT * FROM `entreprise` where id='$e_id'";
									$r=mysqli_query($dbc,$q);
									$row=mysqli_fetch_assoc($r)
								?>
          <div class="col-md-3 d-flex ftco-animate">
            <div class="blog-entry align-self-stretch">
              <a href="dt_off.php?id=<?= $row3['id'] ?>" class="block-20" style="background-image: url('<?= $row3['img'] ?>');">
              </a>
              <div class="text mt-3">
              	<div class="meta mb-2">
                  <div><?= $row3['date'] ?></div>
                  <div><a href="profil_entreprise.php?id=<?= $row['id'] ?>"><?= $row['denomination'] ?></a></div>
                  <!-- <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div> -->
                </div>
                <h3 class="heading"><a href="dt_off.php?id=<?= $row3['id'] ?>"><?= $row3['title'] ?></a></h3>
              </div>
            </div>
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

    <footer class="ftco-footer ftco-bg-dark ftco-section">
      <div class="container">
        <div class="row mb-5">
        	<div class="col-md">
             <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Skillhunt Jobboard</h2>
              <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-3">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Employers</h2>
              <ul class="list-unstyled">
                <li><a href="#" class="pb-1 d-block">Browse Candidates</a></li>
                <li><a href="#" class="pb-1 d-block">Post a Job</a></li>
                <li><a href="#" class="pb-1 d-block">Employer Listing</a></li>
                <li><a href="#" class="pb-1 d-block">Resume Page</a></li>
                <li><a href="#" class="pb-1 d-block">Dashboard</a></li>
                <li><a href="#" class="pb-1 d-block">Job Packages</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-4">
              <h2 class="ftco-heading-2">Candidate</h2>
              <ul class="list-unstyled">
                <li><a href="#" class="pb-1 d-block">Browse Jobs</a></li>
                <li><a href="#" class="pb-1 d-block">Submit Resume</a></li>
                <li><a href="#" class="pb-1 d-block">Dashboard</a></li>
                <li><a href="#" class="pb-1 d-block">Browse Categories</a></li>
                <li><a href="#" class="pb-1 d-block">My Bookmarks</a></li>
                <li><a href="#" class="pb-1 d-block">Candidate Listing</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-4">
              <h2 class="ftco-heading-2">Account</h2>
              <ul class="list-unstyled">
                <li><a href="#" class="pb-1 d-block">My Account</a></li>
                <li><a href="#" class="pb-1 d-block">Sign In</a></li>
                <li><a href="#" class="pb-1 d-block">Create Account</a></li>
                <li><a href="#" class="pb-1 d-block">Checkout</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Have a Questions?</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
	                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+2 392 3929 210</span></a></li>
	                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@yourdomain.com</span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart text-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
          </div>
        </div>
      </div>
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <?php
    include 'xjs.html';
  ?>
    
  </body>
</html>