<?php
	function connection()
{
	return new PDO('mysql:host=localhost;dbname=bd;charset=utf8', 'root', '');
}


	function recupArbitreCentral(){
		$bdd = connection();

	    $result=$bdd->prepare("SELECT * from arbitre where enum_poste LIKE'central'");
	    $result->execute();
	    $resultat=$result->fetchAll();

	    return $resultat;
	}

	function recupArbitreAssistant(){
		$bdd = connection();

	    $result=$bdd->prepare("SELECT * from arbitre where enum_poste LIKE'assistant'");
	    $result->execute();
	    $resultat=$result->fetchAll();

	    return $resultat;
	}

		function recupEquipes(){
		$bdd = connection();

	    $result=$bdd->prepare("SELECT * from equipe");
	    $result->execute();
	    $resultat=$result->fetchAll();

	    return $resultat;
	}

	function recupJoueurs(){
		$bdd = connection();

	    $result=$bdd->prepare("SELECT * from joueur ");
	    $result->execute();
	    $resultat=$result->fetchAll();

	    return $resultat;
	}

	/*function recupJoueurs($idequipe){
		$bdd = connection();

	    $result=$bdd->prepare("SELECT * from joueur where id_equipe=: id");
	    $result->execute(array('id'=>$idequipe));
	    $resultat=$result->fetchAll();

	    return $resultat;
	}
	*/

	function recupRencontres(){
		$bdd = connection();

	    $result=$bdd->prepare("SELECT * from rencontre");
	    $result->execute();
	    $resultat=$result->fetchAll();

	    return $resultat;
	}

		function recupStades(){
		$bdd = connection();

	    $result=$bdd->prepare("SELECT * from stade");
	    $result->execute();
	    $resultat=$result->fetchAll();

	    return $resultat;
	}

			function recupPhases(){
		$bdd = connection();

	    $result=$bdd->prepare("SELECT * from phase");
	    $result->execute();
	    $resultat=$result->fetchAll();

	    return $resultat;
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

	function recupDernierRencontre(){


	    $bdd = connection();
	    $req=$bdd->prepare("select id_rencontre from rencontre where id_rencontre >= ALL (select id_rencontre from rencontre)");
	    $req->execute(array()) ;
		$req=$req->fetch();
	    return $req;
	}


		function recupEquipe($idEquipe){


		$bdd = connection();
	    $req=$bdd->prepare("select nom_equipe,flag from equipe where id_equipe= :id ");
	    $req->execute(array(
	    	'id'=>$idEquipe
		)) ;
		$req=$req->fetchAll();
	    return $req;
	}

	function recupNomEquipe($idEquipe){


		$bdd = connection();
	    $req=$bdd->prepare("select nom_equipe from equipe where id_equipe= :id ");
	    $req->execute(array(
	    	'id'=>$idEquipe
		)) ;
		$req=$req->fetch();
	    return $req['nom_equipe'];
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

		function recupJoueurByNumero($numero, $equipe){


	    $bdd = connection();
	    $req=$bdd->prepare("select id_joueur from joueur where id_equipe = :equipe and numero = :numero ");
	    $req->execute(array(
	    	'equipe'=>$equipe,
	    	'numero'=>$numero
		)) ;
		$req=$req->fetch();
	    return $req["id_joueur"];
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
		$bdd1 = connection();

	    $result1=$bdd1->prepare("INSERT INTO `arbitre` (`nom_arbitre`, `prenom_arbitre`, `enum_poste`) VALUES (:nom1, :prenom1, :poste1)");
	    $result1->execute(array(
	    	'nom1'=>$nom_arbitre,
	    	'prenom1'=>$prenom_arbitre,
	    	'poste1'=>$poste_arbitre ));
}


function ajouterRencontreJoueur($joueur,$rencontre){
		$bdd1 = connection();

	    $result1=$bdd1->prepare("INSERT INTO `rencontre_joueur` (`id_joueur`, `id_rencontre`) VALUES (:joueur, :rencontre)");
	    $result1->execute(array(
	    	'joueur'=>$joueur,
	    	'rencontre'=>$rencontre));
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

function ajouterEvenement($type,$joueur,$idrencontre,$minute){
		$bdd2 = connection();

	    $result2=$bdd2->prepare("INSERT INTO `evenement` (`type`,`id_joueur`,`id_rencontre`,`minute`) VALUES (:type, :id_joueur, :id_rencontre, :minute )");
	    $result2->execute(array(
	    	'type'=>$type, 
			'id_joueur'=>$joueur,
			'id_rencontre'=>$idrencontre,
			'minute'=>$minute));
}

function ajouterRencontre($date,$heure,$idequipe1,$idequipe2,$idstade,$idphase,$termine){
		$bdd2 = connection();

	    $result2=$bdd2->prepare("INSERT INTO `rencontre` (`date_rencontre`,`heure_rencontre`,`id_equipe1`,`id_equipe2`,`id_stade`,`id_phase`,`termine`) VALUES (:dateR, :heure, :id_equipe1, :id_equipe2, :id_stade, :id_phase, :termine )");
	    $result2->execute(array(
	    	'dateR'=>$date, 
			'heure'=>$heure,
			'id_equipe1'=>$idequipe1,
			'id_equipe2'=>$idequipe2, 
			'id_stade'=>$idstade,
			'id_phase'=>$idphase,
			'termine'=>$termine));
}

function creerRencontre($date,$heure,$idequipe1,$idequipe2,$idstade,$idphase){
		$bdd2 = connection();

	    $result2=$bdd2->prepare("INSERT INTO `rencontre` (`date_rencontre`,`heure_rencontre`,`id_equipe1`,`id_equipe2`,`id_stade`,`id_phase`) VALUES (:dateR, :heure, :id_equipe1, :id_equipe2, :id_stade, :id_phase )");
	    $result2->execute(array(
	    	'dateR'=>$date, 
			'heure'=>$heure,
			'id_equipe1'=>$idequipe1,
			'id_equipe2'=>$idequipe2, 
			'id_stade'=>$idstade,
			'id_phase'=>$idphase));
}

function ajouterRencontreArbitre($rencontre,$arbitre){
		$bdd2 = connection();

	    $result2=$bdd2->prepare("INSERT INTO `rencontre_arbitre` (`id_rencontre`,`id_arbitre`) VALUES (:rencontre, :arbitre )");
	    $result2->execute(array(
	    	'rencontre'=>$rencontre, 
			'arbitre'=>$arbitre));
}

function terminerRencontre($rencontre){
		$bdd=connection();

		 $result2=$bdd->prepare("UPDATE `rencontre` SET `termine` = 'oui' WHERE `rencontre`.`id_rencontre` = :rencontre");
	    $result2->execute(array(
	    	'rencontre'=>$rencontre));
}
?>