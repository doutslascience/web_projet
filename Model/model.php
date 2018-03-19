<?php
	function connection()
{
	return new PDO('mysql:host=localhost;dbname=bd;charset=utf8', 'root', 'root');
}



	function recupRencontresNonTermines(){
		$bdd = connection();

	    $result=$bdd->prepare("SELECT * from rencontre where termine LIKE'non'");
	    $result->execute();
	    $resultat=$result->fetchAll();

	    return $resultat;
	}

		function recupRencontresTermines(){
		$bdd = connection();

	    $result=$bdd->prepare("SELECT * from rencontre where termine LIKE 'oui'");
	    $result->execute();
	    $resultat=$result->fetchAll();

	    return $resultat;
	}


		function recupEquipe($idEquipe){


		$bdd = connection();
	    $req=$bdd->prepare("select nom_equipe from equipe where id_equipe= :id ");
	    $req->execute(array(
	    	'id'=>$idEquipe
		)) ;
		$req=$req->fetch();
	    return $req["nom_equipe"];
	}

		function recupButeurs($equipe, $rencontre){


		$bdd = connection();
	    $req=$bdd->prepare("select minute,nom_joueur, prenom_joueur from evenement inner join joueur on evenement.type= 'but' and evenement.id_joueur=joueur.id_joueur and joueur.id_equipe= :equipe and evenement.id_rencontre= :idrencontre ");
	    $req->execute(array(
	    	'equipe'=>$equipe,
	    	'idrencontre'=>$rencontre
		)) ;

		$req=$req->fetchAll();

	    return $req;
	}


	function getEventsParEquipe($type, $idEquipe,$rencontre){


	    $bdd = connection();
	    $req=$bdd->prepare("select id_evenement from evenement inner join joueur on type= :type and joueur.id_joueur=evenement.id_joueur and joueur.id_equipe = :equipe and evenement.id_rencontre= :rencontre");
	    $req->execute(array(
	    	'equipe'=>$idEquipe,
	    	'type'=>$type,
	    	'rencontre'=>$rencontre
		)) ;
		$req=$req->fetchAll();
	    return count ($req);
	}


	function recupPhaseRencontre($rencontre){


	    $bdd = connection();
	    $req=$bdd->prepare("select enum_phase from phase inner join rencontre on rencontre.id_rencontre= :rencontre");
	    $req->execute(array(
	    	'rencontre'=>$rencontre
		)) ;
		$req=$req->fetch();
	    return $req["enum_phase"];
	}


		function recupArbitres($rencontre){


	    $bdd = connection();
	    $req=$bdd->prepare("select nom_arbitre, enum_poste from arbitre inner join rencontre_arbitre on rencontre_arbitre.id_rencontre= :rencontre and 
	    	rencontre_arbitre.id_arbitre=arbitre.id_arbitre");
	    $req->execute(array(
	    	'rencontre'=>$rencontre
		)) ;
		$req=$req->fetchAll();
	    return $req;
	}

function ajouterArbitre($nom_arbitre,$prenom_arbitre,$poste_arbitre){
		$bdd1 = connection_arbitre();

	    $result1=$bdd1->prepare("INSERT INTO `arbitre` (`nom_arbitre`, `prenom_arbitre`, `enum_poste`) VALUES (:nom1, :prenom1, :poste1)");
	    $result1->execute(array(
	    	'nom1'=>$nom_arbitre,
	    	'prenom1'=>$prenom_arbitre,
	    	'poste1'=>$poste_arbitre ));
}


function ajouterJoueur($nom,$prenom,$nationalite,$equipe){
		$bdd = connection();

	    $result=$bdd->prepare("INSERT INTO `joueur` (`nom_joueur`, `prenom_joueur`, `nationalite_joueur`, `id_equipe`) VALUES (:nom, :prenom, :nationalite,:equipe)");
	    $result->execute(array(
	    	'nom'=>$nom,
	    	'prenom'=>$prenom,
	    	'nationalite'=>$nationalite,
	    	'equipe'=>$equipe
	));
	}

function ajouterEntraineur($nom_entraineur,$prenom_entraineur){
		$bdd2 = connection();

	    $result2=$bdd2->prepare("INSERT INTO `entraineur` (`nom_entraineur`, `prenom_entraineur`) VALUES (:nom2, :prenom2 )");
	    $result2->execute(array(
	    	'nom2'=>$nom_entraineur,
	    	'prenom2'=>$prenom_entraineur ));
	    	
}

function ajouterLieux($nom_stade,$ville_stade){
		$bdd2 = connection();

	    $result2=$bdd2->prepare("INSERT INTO `stade` (`nom_stade`,`ville_stade`) VALUES (:nom_stade, :ville_stade )");
	    $result2->execute(array(
	    	'nom_stade'=>$nom_stade, 
			'ville_stade'=>$ville_stade));
	    	
}
?>