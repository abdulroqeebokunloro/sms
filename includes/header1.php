<?php
	ob_start();
	require_once "functions.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title><?php echo get_school_name(); ?></title>



	<link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Fredericka+the+Great" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">
    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">


    	<!-- stylesheet -->
	<link rel="stylesheet" tpe="text/css" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" tpe="text/css" href="assets/css/font-awesome.min.css">
	<link rel="stylesheet" tpe="text/css" href="style.css">

</head>
<body>

	<div class="main-menu-wrap">
		<nav class="navbar" style="">
			<div class="container" style="background: orangered">
				<div class="navbar-header">
				<button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div> 
				<div id="navbarCollapse" class="collapse navbar-collapse">
					<ul class="nav navbar-nav text-right">
						<li><a href="index.php">Home</a></li>
						<li><a href="about.php">About</a></li>
						<li><a href="teachers.php">Teachers</a></li>
						<li><a href="gallery.php">Gallery</a></li>
						<li><a href="admission.php">Admission</a></li>
						<li><a href="result.php">Result</a></li>
						<li><a href="contact.php">Contact</a></li>
						<?php 
							if(!is_user_logged_in()) {
								echo "<li><a href='login.php'>Login</a></li>";
							} else {
								if($_SESSION['user_role'] == 'administrator') {
									echo "<li><a href='school-admin/index.php' target='_blank'>Dashboard</a></li>";
								} elseif($_SESSION['user_role'] == 'student') {
									echo "<li><a href='student-profile/index.php' target='_blank'>Dashboard</a></li>";
								} elseif($_SESSION['user_role'] == 'teacher') {
									echo "<li><a href='teacher-dashboard/index.php' target='_blank'>Dashboard</a></li>";
								} elseif($_SESSION['user_role'] == 'controller') {
									echo "<li><a href='controller/index.php' target='_blank'>Dashboard</a></li>";
									header("Location: controller/index.php");
								} elseif($_SESSION['user_role'] == 'librarian') {
									echo "<li><a href='librarian/index.php' target='_blank'>Dashboard</a></li>";
								}
							}
						?>
					</ul>
				</div>
			</div>
		</nav>
	</div>


<!--     <section class="home-slider owl-carousel">
      <div class="slider-item" style="background-image:url(images/bg_1.jpg);">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-8 text-center ftco-animate">
            <h1 class="mb-4"><?php echo get_school_name(); ?> <span><i>THE BEST SCHOOL FOR YOUR KIDS</i></span></h1>
            <p><a href="#" class="btn btn-secondary px-4 py-3 mt-3">Read More</a></p>
          </div>
        </div>
        </div>
      </div>

      <div class="slider-item" style="background-image:url(images/bg_2.jpg);">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-8 text-center ftco-animate">
            <h1 class="mb-4">Children<span>Deserve the best</span></h1>
            <p><a href="#" class="btn btn-secondary px-4 py-3 mt-3">Read More</a></p>
          </div>
        </div>
        </div>
      </div>
    </section> -->