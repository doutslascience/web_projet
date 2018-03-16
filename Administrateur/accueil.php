<?php 
session_start();
if($_SESSION['pseudo'])
{
	$_SESSION['pseudo'];
}
else
{
	header('location:index.php');
}

 ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<title>Accueil</title>
</head>
<body>
	<form action="deconnexion.php" method="post">
		<label style="margin-left:1200px;color:green;"><?php echo $_SESSION['pseudo']; ?>
			<input type="submit" value="deconnexion" >
		</label>
	</form>
<header><h2>Accueil-Administrateur</h2>
	<hr>
	<h2>Bienvenue a l'accueil administrateur </h2>
	<h3>Ici vous pouvez mettre à jour les résultats des rencontres</h3>
	
</header>
<div>
	<?php include('menu.php') ?>
</div>
</body>
</html>