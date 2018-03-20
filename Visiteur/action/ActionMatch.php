<?php
include'../../Model/model.php'; 
if(isset($_REQUEST["stade"])){
	$minute=$_REQUEST["minute"];
	//echo $minute;
	if($minute<10) $minute="0".$minute; 
	$heure= $_REQUEST["heure"].":".$minute.":00";
	$date=str_replace("/", "-", $_REQUEST["date"]);
	echo $date;

	creerRencontre($date,$heure,$_REQUEST["equipe1"],$_REQUEST["equipe2"],$_REQUEST["stade"],$_REQUEST["phase"]);

	$rencontre=recupDernierRencontre();
	ajouterRencontreArbitre($rencontre["id_rencontre"],$_REQUEST["principal"]);
	ajouterRencontreArbitre($rencontre["id_rencontre"],$_REQUEST["assistant1"]);
	ajouterRencontreArbitre($rencontre["id_rencontre"],$_REQUEST["assistant2"]); 
	//header("location: ../rencontres.php");
		echo '<script type="text/JavaScript" > alert ("Rencontre ajoute"); </script>';
		echo '<meta http-equiv="Refresh" content="0;url=../rencontres.php">';
        exit(); 

}
?>