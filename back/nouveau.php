<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Evénemment à Antananarivo</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <link href="../img/logo.ico" rel="icon">
    <link href="#" rel="apple-touch-icon">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,700" rel="stylesheet">
    <link href="../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
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
                <a class="navbar-brand" href="../index.php">
                    Tana show
                </a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="active"><a href="../index.php">Accueil</a></li>
                    <li><a href="../programme.php" class="smoothscroll">Programme</a></li>
                    <li><a href="nouveau.php" class="smoothscroll">Nouveau</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="rv-form col-md-12">
        <form method="post" action="nouveau.php" enctype='multipart/form-data'>
            <div class="form-group row">
                <label for="nom_artist" class="col-sm-2 col-form-label">Nom de l'artist</label>
                <div class="col-sm-4">
                    <input type="text" name="nom_artist" class="form-control" id="nom_artist"
                           placeholder="Nom de l'artist">
                </div>
            </div>
            <div class="form-group row">
                <label for="lieu" class="col-sm-2 col-form-label">Lieu</label>
                <div class="col-sm-4">
                    <input type="text" name="lieu" class="form-control" id="lieu"
                           placeholder="lieu">
                </div>
            </div>
            <div class="form-group row">
                <label for="date" class="col-sm-2 col-form-label">Date</label>
                <div class="col-sm-4">
                    <input type="date" name="date" class="form-control"
                           id="date" placeholder="date">
                </div>
            </div>
            <div class="form-group row">
                <label for="heure" class="col-sm-2 col-form-label">Heure</label>
                <div class="col-sm-4">
                    <input type="time" name="heure" class="form-control" id="heure"
                           placeholder="Heure">
                </div>
            </div>
            <div class="form-group row">
                <label for="prix" class="col-sm-2 col-form-label">Prix</label>
                <div class="col-sm-4">
                    <input type="number" name="prix" class="form-control" id="prix"
                           placeholder="prix">
                </div>
            </div>
            <div class="form-group row">
                <label for="type" class="col-sm-2 col-form-label">Type</label>
                <div class="col-sm-4">
                    <input type="text" name="type" class="form-control" id="type"
                           placeholder="type de l'événemment">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-2">
                    <button type="submit" class="btn btn btn-sm rv-annuler">Annuler</button>
                </div>
                <div class="col-sm-4">
                    <button type="submit" name="envoyer" class="btn btn-sm rv-envoyer">Envoyer</button>
                </div>
            </div>
        </form>
    </div>
    <br>

    <?php
        include_once "connexion.php";

        /**
         * récupérer les données dans la formulaire
        */
        if(isset($_POST['nom_artist']) && isset($_POST['lieu']) && isset($_POST['date']) && isset($_POST['heure']) &&
            isset($_POST['prix']) && isset($_POST['type'])){
            $_rv_nom = $_POST['nom_artist'];
            $_rv_lieu = $_POST['lieu'];
            $_rv_date = $_POST['date'];
            $_rv_heure = $_POST['heure'];
            $_rv_prix = $_POST['prix'];
            $_rv_type = $_POST['type'];
            $_rv_prix = (int)$_rv_prix;

            function validateDate($date, $format = 'Y-d-m H:i:s')
            {
                $d = DateTime::createFromFormat($format, $date);
                return $d && $d->format($format) == $date;
            }

            /**
             * insérer les données dans la base de données
             */
            if ( !empty($_rv_nom) &&  !empty($_rv_lieu) &&  validateDate($_rv_date, 'Y-m-d') &&
            validateDate($_rv_heure, 'H:i') && !is_null($_rv_prix) && !empty($_rv_type)) {

                $sql = "INSERT INTO information (id_info, nom_artist, lieu, datei, heure, prix, typei)
                        VALUES ('', '$_rv_nom', '$_rv_lieu', '$_rv_date', '$_rv_heure','$_rv_prix', '$_rv_type')";

                if ($connexion->query($sql) === TRUE) {
                    echo "Nouvelle information insérée". "<br/> Cliquer <a href='../index.php'>ici</a> pour revenir à la page d'accueil";
                    exit();
                } else {
                    echo "Error: " . $sql . "<br>" . $connexion->error;
                }
            } else {
                echo " Erreur de typage de donnée";
                var_dump(is_string($_rv_nom));
                var_dump(validateDate($_rv_heure, 'H:i'));
                var_dump(validateDate($_rv_date, 'Y-m-d'));
                var_dump( is_string($_rv_lieu));
                var_dump(is_int($_rv_prix));
                var_dump(is_string($_rv_type));
            }


            $connexion->close();
        }
    ?>

    <!-- Liens JavaScript -->
    <script src="../lib/jquery/jquery.min.js"></script>
    <script src="../lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="../js/main.js"></script>

</body>
</html>
