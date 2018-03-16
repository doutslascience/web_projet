<?php 
$pseudo=$_POST['pseudo'];
$mdp=$_POST['mdp'];
$connect=mysqli_connect("127.0.0.1","root","") or die("");
if($connect)
{
	mysqli_select_db($connect,"mabase") or die("");
	$req="SELECT * from administrateur where pseudo='$pseudo'";
	$query=mysqli_query($connect,$req) or die(mysqli_error());
	$data=mysqli_fetch_assoc($query);
	if ($data['mdp']==$mdp)
	{
		session_start();
		$_SESSION['pseudo']=$pseudo;
		header('location:accueil.php');
	}
	else
	{
		include('index.php');
		echo 'Vous avez saisi un mauvais mot de passe ou un mauvais login';
	}
}

 ?>