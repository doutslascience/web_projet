<?php include'../../Model/model.php'; 

ajouterLieux($_REQUEST['nom'],$_REQUEST['ville']);
//header('location:../accueil.php');
echo '<script type="text/JavaScript" > alert ("Lieu ajoute"); </script>';
		echo '<meta http-equiv="Refresh" content="0;url=../lieux.php">';
 ?>