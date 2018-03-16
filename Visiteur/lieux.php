
<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>FIFA &mdash; World Cup 2018</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Themify Icons-->
	<link rel="stylesheet" href="css/themify-icons.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="css/magnific-popup.css">

	<!-- Owl Carousel  -->
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style.css">

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body>
<?php 
/* session_start();
if($_SESSION['pseudo'])
{
	$_SESSION['pseudo'];

}
else
{
	header('location:index.php');
} */

 ?>
	<div class="gtco-loader"></div>

	<div id="page">
	<nav class="gtco-nav" role="navigation">
		<div class="gtco-container">
			<div class="row">
				<div class="col-sm-4 col-xs-12">
					<div id="gtco-logo"><a href="index.php">FIFA <em>&mdash;</em> World Cup 2018 <em>.</em></a></div>
				</div>

				<div class="col-xs-8 text-right menu-1">
					<ul>
						<li class="active"><a href="index.html"><Accueil></Accueil></a></li>
						<li class="has-dropdown"><a href="lieux.php">Lieux</a></li>
						<li class="has-dropdown"><a href="rencontre.php">Rencontre</a></li>
						<li><a href="evenement.php">Evenement</a></li>&nbsp;&nbsp;&nbsp;&nbsp;
						<li style="color: green"><em><u><strong><?php // echo $_SESSION['pseudo'];
							?> Nom d'utilisateur</strong></u></em></li>&nbsp;
						<li class="animate-box" data-animate-effect="fadeInUp"><a href="deconnexion.php" class="btn btn-white btn-lg btn-outline">Se Deconnecter</a></li>
					</ul>
				</div>
			</div>
			<form action="lieux.php" method="post">
				<fieldset style="width: 50%">
					<center ><h1 style="color: #ffffff">Inserer le Lieux</h1></center>
					<label style="color: #ffffff">nom du stade</label>&nbsp;<input type="text" name="nom"><br><br>
					<label style="color: #ffffff">nom de la ville</label>&nbsp;<input type="text" name="ville"><br><br>
					<input type="submit" value="Inserer"><br><br>
				</fieldset>

			</form>
			
		</div>
	</nav>

	<header id="gtco-header" class="gtco-cover" role="banner" style="background-image:url(images/img_bg_1.jpg);">
		<div class="overlay"></div>
		
	</header>

	<div id="gtco-features-3">
		<div class="gtco-container">
			
		</div>
	</div>


	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>

	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Carousel -->
	<script src="js/owl.carousel.min.js"></script>
	<!-- countTo -->
	<script src="js/jquery.countTo.js"></script>
	<!-- Magnific Popup -->
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/magnific-popup-options.js"></script>
	<!-- Main -->
	<script src="js/main.js"></script>

	</body>
</html>
