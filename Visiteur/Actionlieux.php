<?php include'../Model/model.php'; 

ajouterLieux($_REQUEST['nom'],$_REQUEST['ville']);
header('location:index.php');
 ?>