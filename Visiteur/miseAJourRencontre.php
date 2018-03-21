<!DOCTYPE HTML>
<?php include'../Model/model.php'; ?>
<html>
	<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>UEFA &mdash; Champions League</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- <link href="https://fonts.googleapis.com/css?family=Droid+Sans" rel="stylesheet"> -->

	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css">
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

	<div class="gtco-loader"></div>

	<div id="page">
	<nav class="gtco-nav" role="navigation">
		<div class="gtco-container">
			<div class="row">
				<div class="col-sm-4 col-xs-12">
					<div id="gtco-logo"><a href="index.php">UEFA <em>&mdash;</em>Champions League <em>.</em></a></div>
				</div>
				<div class="col-xs-8 text-right menu-1">
					<ul>
						<li><a href="index.php">Accueil</a></li>
						<li class="active"><a href="stats.php">Statistiques</a></li>
						<li><a href="connexion.html">Connectez-vous</a></li>
					</ul>
				</div>
			</div>

		</div>
	</nav>

	<header id="gtco-header" class="gtco-cover gtco-cover-xs" role="banner" style="background-image:url(images/img_bg_1.jpg);">
		<div class="overlay"></div>
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center">
					<div class="display-t">
						<div class="display-tc">
							<h1 class="animate-box" data-animate-effect="fadeInUp">Statistiques</h1>
							<h2 class="animate-box" data-animate-effect="fadeInUp">Details du match</h2>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>

	<div class="gtco-section border-bottom" >
		<div class="gtco-container">
			<div class="row">
			    <div class="col-md-2 ">
			    	<?php $equipe=recupEquipe($_GET["equipe1"]);
			    		foreach ($equipe as $key => $value) {
			    	 ?>
						<img src="images/flag/<?php echo $value["flag"]; ?>" width="128px" height="128px" alt="Japon" style="margin-top: -50px;"><br>
						<h2><?php echo $value["nom_equipe"];  }?></h2>

					</div>
			    <div class="col-md-2">
			    	<form action="action/maj.php"  method="POST" enctype="multipart/form-data">
			    		<label for="composition"> Feuille de match
  						<input   type="file" name="composition" id="composition" required>
			    		<input type="hidden" name="rencontre" value="<?php echo $_GET["rencontre"] ?>" >
			    		<input type="hidden" name="equipe" value="<?php echo $_GET["equipe1"] ?>" >
			    	    <button type="submit" name="soumission" class="btn btn-success">Soumettre</button>
			    	</form>
			    </div>

			    <div class="col-md-2 col-md-offset-3">
			    	<form action="action/maj.php"  method="post" enctype="multipart/form-data">
			    		<label for="composition1"> Feuille de match
  						<input   type="file" name="composition" id="composition1" required>
			    		<input type="hidden" name="rencontre" value="<?php echo $_GET["rencontre"] ?>" >
			    		<input type="hidden" name="equipe" value="<?php echo $_GET["equipe2"] ?>" >
			    	    <button type="submit" name="soumission" class="btn btn-success">Soumettre</button>
			    	</form>

			    </div>
			    <div class="col-md-2 col-md-offset-1">
						<?php $equipe=recupEquipe($_GET["equipe2"]);
			    		foreach ($equipe as $key => $value) {
			    	 ?>
						<img src="images/flag/<?php echo $value["flag"]; ?>" width="128px" height="128px" alt="Japon" style="margin-top: -50px;"><br>
						<h2><?php echo $value["nom_equipe"];  }?></h2>
				</div>

			</div>

			<div class="row">

				<div class="col-lg-3 col-lg-offset-5">
					<h3>Arbitres: </h3>
					<?php
						$arbitres= recupArbitres($_GET["rencontre"]);
						foreach ($arbitres as $key => $value) {
							echo $value["nom_arbitre"]." : ".$value["enum_poste"]."<br>" ;
							# code...
						}
					?>



				</div>
				
			</div>
			<br><br>
				<div class="row">
					<div class="col-lg- col-lg-offset-5">
					<form action="action/maj.php">
						<button name="terminer" class="btn btn-success"> Declarer la fin du match</button>
						<input type="hidden" name="rencontre" value="<?php echo $_GET["rencontre"] ?>">
					</form>

					</div>

				</div>
			
			</div>
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
