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



?>