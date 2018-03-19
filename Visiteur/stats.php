<!DOCTYPE HTML>
<?php include'../Model/model.php'; ?>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>FIFA &mdash; World Cup 2018</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- <link href="https://fonts.googleapis.com/css?family=Droid+Sans" rel="stylesheet"> -->

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
							<h2 class="animate-box" data-animate-effect="fadeInUp">Ici, vous pourrez voir les statistiques des derniers matchs</h2>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>

	<?php $rencontres = recupRencontresTermines(); 

	foreach ($rencontres as $key => $value) { ?>


			<div class="gtco-section border-bottom">
		<div class="gtco-container">
			<div class="row">
			    <div class="col-md-2 col-md-offset-1">
						<?php $equipe=recupEquipe($value["id_equipe1"]);
			    		foreach ($equipe as $key => $value1) {
			    	 ?>
						<img src="images/flag/<?php echo $value1["flag"]; ?>" width="128px" height="128px" alt="Japon" style="margin-top: -50px;"><br>
						<h2><?php echo $value1["nom_equipe"];  }?></h2>
					</div>
			    <div class="col-md-2"><h1><?php echo count(recupButeurs($value["id_equipe1"],$value["id_rencontre"])); ?></h1></div>
			    <div class="col-md-2"> 

			        <a href='details.php?equipe1=<?php echo $value["id_equipe1"]; ?>&equipe2=<?php echo $value["id_equipe2"]; ?>&rencontre=<?php echo $value["id_rencontre"]; ?>'>
						<button type="button" class="btn btn-primary">Details</button>
                    </a>
			     </div>
			    <div class="col-md-2"><h1><?php echo count(recupButeurs($value["id_equipe2"],$value["id_rencontre"])) ?></h1></div>
			    <div class="col-md-2">
						<?php $equipe=recupEquipe($value["id_equipe2"]);
			    		foreach ($equipe as $key => $value2) {
			    	 ?>
						<img src="images/flag/<?php echo $value2["flag"]; ?>" width="128px" height="128px" alt="Japon" style="margin-top: -50px;"><br>
						<h2><?php echo $value2["nom_equipe"];  }?></h2>
					</div>
			</div>
		</div>
	</div>';

	<?php } ?>

	

	<div class="gtco-section border-bottom" >
		<div class="gtco-container">
			<div class="row">
			    <div class="col-md-2 col-md-offset-1">
						<!--<img src="images/png/flag/063-japan.png" width="128px" height="128px" alt="Japon" style="margin-top: -50px;"><br>-->
						<h2>Japon</h2>
					</div>
			    <div class="col-md-2"><h1>3</h1></div>
			    <div class="col-md-2"><em>&mdash;</em></div>
			    <div class="col-md-2"><h1>2</h1></div>
			    <div class="col-md-2">
						<!--<img src="images/png/flag/158-egypt.png" width="128px" height="128px" alt="Japon" style="margin-top: -50px;"><br>-->
						<h2>Egypte</h2>
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
