<?php include'../../Model/model.php'; 

if(isset($_REQUEST["soumission"])){
	$file=$_FILES["composition"]["tmp_name"];

	if (($handle = fopen($file, "r")) !== FALSE) {
   		 while (($data = fgetcsv($handle, 1000, "/")) !== FALSE) {
        
   		 	//echo $data[1];
   		 	$joueur = recupJoueurByNumero($data[1], $_REQUEST["equipe"]);
   		 	echo $joueur;
   		 	ajouterRencontreJoueur($joueur, $_REQUEST["rencontre"]);
   		  }
   		 fclose($handle);
	} 
			echo '<script type="text/JavaScript" > alert ("Feuille de match ajoutee"); </script>';
			echo '<meta http-equiv="Refresh" content="0;url=../rencontres.php">';
       		 exit(); 
}

else if(isset($_REQUEST["terminer"])){
	terminerRencontre($_REQUEST["rencontre"]);
			echo '<script type="text/JavaScript" > alert ("Rencontre terminee"); </script>';
		echo '<meta http-equiv="Refresh" content="0;url=../rencontres.php">';
        exit(); 
}

		echo '<meta http-equiv="Refresh" content="0;url=../rencontres.php">';
        exit(); 

?>