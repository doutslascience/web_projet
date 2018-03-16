<!DOCTYPE html>
<html>
<head>
	<title></title>
    
</head>

<body>
<?
    $pdo = new PDO('mysql:host=localhost;dbname=bd;charset=utf8', 'root', '');
?>

       <form method="POST">

        <input type="text" name="nom2"> Nom <br>
        <input type="text" name="prenom2"> Prenom <br>
        <?php
            $req = $pdo->prepare('SELECT * FROM equipe');
            $req->execute();
            $rendu = "<select name=\"choix\">";
            while ($resultat = $req->fetch())
            {
              $rendu .= "<option value=\"".$resultat['nom_equipe']."\">".$resultat['nom_equipe']."</option>";
            }
            $rendu .= "</select><br/>";
            echo $rendu ;
          ?>
        <button type="submit" name="entraineur"> Valider </button>
        
    </form>




    <?

    if(isset($_REQUEST["joueur"])){
        ajouterJoueur($_REQUEST["nom"],$_REQUEST["prenom"],$_REQUEST["nationalite"],$_REQUEST["choix"]);
    }

?>




</body>
</html>