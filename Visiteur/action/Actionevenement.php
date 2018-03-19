<?php include'../../Model/model.php'; 

ajouterEvenement($_REQUEST['type'],$_REQUEST['joueur'],$_REQUEST['rencontre'],$_REQUEST['minute']);
header('location:../accueil.php');
 ?>