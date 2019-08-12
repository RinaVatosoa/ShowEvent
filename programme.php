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
                    <li><a href="back/nouveau.php" class="smoothscroll">Nouveau</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="modal fade" id="rn-reserver" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="modalLabel">Réserver une place</h4>
                </div>
                <div class="modal-body">
                    Information:
                    <ul>
                        <li class="rn-list-info"></li>
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
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

                echo "
                <table class='table col-10 center table-bordered vt-table'>
                     <thead>
                         <tr>
                            <th>Id</th>
                            <th>Artist</th>
                            <th>Lieu</th>
                            <th>Date</th>
                            <th>Heure</th>
                            <th>prix d'éntrée( en Ariary)</th>
                            <th>Réserver</th>
                         </tr>
                     </thead>";
                     while ( $_rv_list_info = mysqli_fetch_array( $_rv_info ) ) {
                         echo "
                         <tbody>
                            <td class='list'>" .$_rv_list_info['id_info']. "</td>    
                            <td class='list'>" .$_rv_list_info['nom_artist']. "</td>
                            <td class='list'>" .$_rv_list_info['lieu']. "</td>
                            <td class='list'>" .$_rv_list_info['datei']. "</td>
                            <td class='list'>" .$_rv_list_info['heure']. "</td>
                            <td class='list'>" .$_rv_list_info['prix']. "</td>
                            <td>
                                <a href='#' class='btn btn-sm rv-reserver' data-toggle='modal' data-target='#rn-reserver'>
                                  Réserver une place
                                </a>
                            </td>
                         </tbody>
                         ";
                     }
                 echo "</table>";
            $_rv_info->close();

            /**
             * close la connexion
             */
            mysqli_close($connexion);
        ?>

        </div>
    </div>

<!-- Liens JavaScript -->
<script src="lib/jquery/jquery.min.js"></script>
<script src="lib/bootstrap/js/bootstrap.min.js"></script>
<script src="js/main.js"></script>

</body>
</html>
