
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>

<body>
	<form action="resultat.php" method="post">
		<fieldset style="width: 50%">
			<label>equipe 1</label>
			<input type="text" name="equipe1">
			<label>equipe 2</label>
			<input type="text" name="equipe2"><br>
			<label>nombre de buts marqué par l'equipe 1</label>
			<input type="number" name="nbbuts1"><br>
			<label>nombre de buts marqué par l'equipe 2</label>
			<input type="number" name="nbbuts2"><br>
			<input type="submit" name="">
		</fieldset>

	</form>

	<?php 
$equipe1=$_POST['equipe1'];
$equipe2=$_POST['equipe2'];
$nbbuts1=$_POST['nbbuts1'];
$nbbuts2=$_POST['nbbuts2'];
$connect=mysqli_connect("127.0.0.1","root","") or die("");
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
 <?php 
 	for($i=1; $i<$nbbuts1; $i++){
 		echo "Nom du joueur<input type=\"text\" name=\"joueur\">";
 }
 ?>
</body>
</html>

