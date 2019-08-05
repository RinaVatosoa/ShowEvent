<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Evénemment à Antananarivo</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <link href="img/logo.ico" rel="icon">
    <link href="#" rel="apple-touch-icon">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,700" rel="stylesheet">
    <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>

    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">
                    Tana show
                </a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="active"><a href="index.php">Accueil</a></li>
                    <li><a href="programme.php" class="smoothscroll">Programme</a></li>
                    <li><a href="nouveau.php" class="smoothscroll">Nouveau</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container">
    <div class=" centered mt mb">
        <h1>Tous les programmes</h1>
        <?php

        /**
         * accéder la connexion à la base de donnée
         */
        include_once "back/connexion.php";

        /**
         * sélecte tous les informations à l'événemment
         */
        $_rv_info = $connexion->query("SELECT * FROM information ORDER BY datei");

        /**
         * afficher tous les contenus de l'événemment
         */
        while ( $_rv_list_info = mysqli_fetch_array( $_rv_info ) ) {
            echo "
            <div class=\"col-lg-4 col-md-4 col-sm-4\">
                <div class=\"card\">
                    <div class='card-img'>
                      <img src='http://placeimg.com/640/320/nature/grayscale' class='img-responsive'>
                      <div class='card-caption'>
                          <span class='h2'>
                            " .$_rv_list_info['typei']. " de <strong>" .$_rv_list_info['nom_artist']. "</strong>
                          </span>
                      </div>
                    </div>
                    <div class='card-body'>
                      <ul class='details'>
                        <li class='details_lieu'>Lieu: " .$_rv_list_info['lieu']. "</li>
                        <li>Date: " .$_rv_list_info['datei']. "</li>
                        <li>heure: " .$_rv_list_info['heure']. "</li>
                      </ul>
                      <table class='table'>
                          <tr><td>Prix d'entrée</td><td class='price'>" .$_rv_list_info['prix']. " Ariary</td></tr>
                      </table>
                      <a href='#' class='btn btn-lg btn-block rv-reserver'>
                          Réserver une place
                      </a>
                      <br>
                    </div>
                </div>
            </div>
          ";
        }

        $_rv_info->close();

        /**
         * close la connexion
         */
        $connexion->close();
        ?>

    </div>
</div>

<!-- Liens JavaScript -->
<script src="lib/jquery/jquery.min.js"></script>
<script src="lib/bootstrap/js/bootstrap.min.js"></script>
<script src="js/main.js"></script>

</body>
</html>
