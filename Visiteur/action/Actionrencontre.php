<?php include'../../Model/model.php'; 

ajouterRencontre($_REQUEST['date'],$_REQUEST['heure'],$_REQUEST['equipe1'],$_REQUEST['equipe2'],$_REQUEST['stade'],$_REQUEST['phase'],$_REQUEST['status']);
header('location:../accueil.php');
 ?>