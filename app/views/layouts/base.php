<!DOCTYPE html>
<html lang="en">

<head>
	<title>Vote-Site - <?=$title?></title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="Elearn project">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Abril+Fatface&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?=self::RES?>/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="<?=self::RES?>/css/animate.css">
    <link rel="stylesheet" href="<?=self::RES?>/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?=self::RES?>/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?=self::RES?>/css/magnific-popup.css">
    <link rel="stylesheet" href="<?=self::RES?>/css/aos.css">
    <link rel="stylesheet" href="<?=self::RES?>/css/ionicons.min.css">
    <link rel="stylesheet" href="<?=self::RES?>/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="<?=self::RES?>/css/jquery.timepicker.css">
    <link rel="stylesheet" href="<?=self::RES?>/css/flaticon.css">
    <link rel="stylesheet" href="<?=self::RES?>/css/icomoon.css">
    <link rel="stylesheet" href="<?=self::RES?>/css/style.css">
    <link rel="stylesheet" href="<?=self::RES?>/css/base.css">

</head>

<body>

<div id="colorlib-page">
		<a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></a>
		<aside id="colorlib-aside" role="complementary" class="js-fullheight">
		<?php include('app/views/includes/nav.php');?>    


		<?php include('app/views/includes/footer.php');?>    
		</aside> <!-- END COLORLIB-ASIDE -->
		<div id="colorlib-main">

		<?php include($this->contentPath); ?>

		</div>
	</div><!-- END COLORLIB-PAGE -->

  <!-- loader -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
<script src="<?=self::RES?>/js/jquery.min.js"></script>
  <script src="<?=self::RES?>/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="<?=self::RES?>/js/popper.min.js"></script>
  <script src="<?=self::RES?>/js/bootstrap.min.js"></script>
  <script src="<?=self::RES?>/js/jquery.easing.1.3.js"></script>
  <script src="<?=self::RES?>/js/jquery.waypoints.min.js"></script>
  <script src="<?=self::RES?>/js/jquery.stellar.min.js"></script>
  <script src="<?=self::RES?>/js/owl.carousel.min.js"></script>
  <script src="<?=self::RES?>/js/jquery.magnific-popup.min.js"></script>
  <script src="<?=self::RES?>/js/aos.js"></script>
  <script src="<?=self::RES?>/js/jquery.animateNumber.min.js"></script>
  <script src="<?=self::RES?>/js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="<?=self::RES?>/js/google-map.js"></script>
  <script src="<?=self::RES?>/js/main.js"></script>
  <script src="<?=$script?>"></script>

</body>

</html>