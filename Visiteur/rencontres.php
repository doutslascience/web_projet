<?php include'../Model/model.php'; ?>
<!DOCTYPE HTML>
<html>
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>UEFA &mdash; Champions League</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Animate.css -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- Icomoon Icon Fonts-->
    <link rel="stylesheet" href="css/icomoon.css">
    <!-- Themify Icons-->
    <link rel="stylesheet" href="css/themify-icons.css">
    <!-- Bootstrap  -->
    <link rel="stylesheet" href="css/bootstrap.css">

    <!-- Magnific Popup -->
    <link rel="stylesheet" href="css/magnific-popup.css">

    <!-- Owl Carousel  -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">

    <!-- Theme style  -->
    <link rel="stylesheet" href="css/style.css">

    <!-- Modernizr JS -->
    <script src="js/modernizr-2.6.2.min.js"></script>
    <!-- FOR IE9 below -->
    <!--[if lt IE 9]>
    <script src="js/respond.min.js"></script>
    <![endif]-->

    </head>
    <body>
<?php 
/* session_start();
if($_SESSION['pseudo'])
{
    $_SESSION['pseudo'];

}
else
{
    header('location:index.php');
} */

        $centraux= recupArbitreCentral();
        $assistants = recupArbitreAssistant();
        $equipes= recupEquipes();
        $stades= recupStades();
        $phases= recupPhases();

 ?>
    <div class="gtco-loader"></div>

    <div id="page">
    <nav class="gtco-nav" role="navigation">
        <div class="gtco-container">
            <div class="row">
                <div class="col-sm-4 col-xs-12">
                    <div id="gtco-logo"><a href="accueil.php">UEFA <em>&mdash;</em>Champions League <em>.</em></a></div>
                </div>

                <div class="col-xs-8 text-right menu-1">
                    <ul>
                        <li class="active"><a href="accueil.php"><Accueil>Acceuil</Accueil></a></li>
                        <li class="has-dropdown"><a href="lieux.php">Lieux</a></li>
                        <li class="has-dropdown"><a href="rencontres.php">Rencontre</a></li>
                        <li><a href="evenement.php">Evenement</a></li>&nbsp;&nbsp;&nbsp;&nbsp;
                        <li style="color: green"><em><u><strong><?php // echo $_SESSION['pseudo'];
                            ?> Nom d'utilisateur</strong></u></em></li>&nbsp;
                        <li class="animate-box" data-animate-effect="fadeInUp"><a href="deconnexion.php" class="btn btn-white btn-lg btn-outline">Se Deconnecter</a></li>
                    </ul>
                </div>
            </div>
            
        </div>
        <div class="row"></div>
        <div class="row">
                <div class="col-lg-5 col-lg-offset-3">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            NOUVELLE RENCONTRE
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                                <div class="col-lg-12">
                                    <!--Debut du formulaire d'ajout de rencontre-->
                                    <form role="form" method="POST" action="action/ActionMatch.php">
                                        <div class="form-group input-group col-lg-12">
                                            <span >Equipe 1</span>
                                            <select class="form-control" required name="equipe1">
                                                 <option value="Equipe 1" disabled selected>Equipe 1</option>
                                                <?php
                                                 foreach ($equipes as $key => $value) {
                                                     echo '<option value="'.$value["id_equipe"].'">'.$value["nom_equipe"].'</option>';
                                                 }
                                                ?>
                                            </select>
                                            
                                        </div>
                                        <div class="form-group input-group col-lg-12">
                                            <span >Equipe 2 </span>
                                                 <select class="form-control" required name="equipe2">
                                                 <option value="Equipe 2" disabled selected>Equipe 2</option>
                                                <?php
                                                 foreach ($equipes as $key => $value) {
                                                     echo '<option value="'.$value["id_equipe"].'">'.$value["nom_equipe"].'</option>';
                                                 }
                                                ?>
                                            </select>
                                        </div>

                                        <div class="form-group input-group col-lg-12">
                                            <span >Stade du match </span>
                                            <select class="form-control" required name="stade">
                                                 <option value="Equipe 1" disabled selected> Stade </option>
                                                <?php
                                                 foreach ($stades as $key => $value) {
                                                     echo '<option value="'.$value["id_stade"].'">'.$value["nom_stade"].'</option>';
                                                 }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group input-group col-lg-12">
                                            <span >Phase du match </span>
                                            <select class="form-control" required name="phase">
                                                 <option value="Equipe 1" disabled selected> Phase </option>
                                                <?php
                                                 foreach ($phases as $key => $value) {
                                                     echo '<option value="'.$value["id_phase"].'">'.$value["enum_phase"].'</option>';
                                                 }
                                                ?>
                                            </select>
                                        </div>
                                        <!--zone d'affichage du calendrier-->
                                        <div style="position:absolute;bottom:200%;">
                                        <table class="ds_box" cellpadding="0" cellspacing="0" id="ds_conclass" style="display: none;">
                                            <tr>
                                                <td id="ds_calclass"></td>
                                            </tr>
                                        </table>
                                        </div>
                                        <!--fin zone d'affichage du calendrier-->
                                        <!-- Les champs texte avec le code "onclick" déclenchant le script -->
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-calendar fa-faw"></i></span>
                                            <input type="text" class="form-control" placeholder="Date" name="date" id="dateP">
                                        </div>

                                        <div class="form-group input-group">

                                            <span class="input-group-addon"><i class="fa fa-map-marker fa-faw"></i></span>
                                            <input type="number" class="form-control" placeholder="Heure" name="heure" min="00" max="23">
                                            <input type="number" name="minute" class="form-control" placeholder="Minute" min="00" max="59" >
                                        </div>
 
                                        <div class="form-group input-group">
                                            <span >Trio arbitral</span>
                                            <select class="form-control" required name="principal">
                                                 <option value="Arbitre Principale" disabled selected>Arbitre Principal</option>
                                                <?php
                                                 foreach ($centraux as $key => $value) {
                                                     echo '<option value="'.$value["id_arbitre"].'">'.$value["nom_arbitre"].'</option>';
                                                 }
                                                ?>
                                            </select>
                                            
                                            <select class="form-control" required name="assistant1">
                                                 <option value="Assistant1" disabled selected>Abitre assistant 1</option>
                                                <?php
                                                 foreach ($assistants as $key => $value) {
                                                     echo '<option value="'.$value["id_arbitre"].'">'.$value["nom_arbitre"].'</option>';
                                                 }
                                                ?>
                                            </select>
                                            <select class="form-control" required name="assistant2">
                                                 <option value="Assistant 2" disabled selected>Arbitre assistant 2</option>
                                                <?php
                                                 foreach ($assistants as $key => $value) {
                                                     echo '<option value="'.$value["id_arbitre"].'">'.$value["nom_arbitre"].'</option>';
                                                 }
                                                ?>
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-info">Créer</button>
                                    </form>
                                    <!--Fin du formulaire d'ajout de rencontre-->
                                </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>



            </div>
            <!-- /.row -->
    </nav>

    <header id="gtco-header" class="gtco-cover" role="banner" style="background-image:url(images/img_bg_1.jpg);">
        <div class="overlay"></div>

        
    </header>



    <div id="gtco-features-3">
        <div class="gtco-container">
            
        </div>
    </div>


    <div class="gototop js-top">
        <a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
    </div>

    <!-- jQuery -->
    <script src="js/jquery.min.js"></script>
    <!-- jQuery Easing -->
    <script src="js/jquery.easing.1.3.js"></script>
    <!-- Bootstrap -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Waypoints -->
    <script src="js/jquery.waypoints.min.js"></script>
    <!-- Carousel -->
    <script src="js/owl.carousel.min.js"></script>
    <!-- countTo -->
    <script src="js/jquery.countTo.js"></script>
    <!-- Magnific Popup -->
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/magnific-popup-options.js"></script>
    <!-- Main -->
    <script src="js/main.js"></script>
    <script type="text/javascript" src="js/datePicker.js"></script>
     <script type="text/javascript">
        $(document).ready(function () {

            $('#dateP').datepicker({
                format: "dd/mm/yyyy"
            });  

        });
    </script>

    </body>
</html>
