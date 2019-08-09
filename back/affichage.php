<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Evénemment à Antananarivo</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="img/logo.ico" rel="icon">
  <link href="#" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div>
        <?php
            include_once "connexion.php";

            $_rv_lieu = $connexion->query("SELECT lieu, nom_artist FROM information");

            echo "Tous les nombres de lieux: $_rv_lieu->num_rows";

            while ( $_rv_nom_lieu = mysqli_fetch_array( $_rv_lieu ) )
            {
                 echo $_rv_nom_lieu['lieu'], $_rv_nom_lieu['nom_artist'];
            }

            $_rv_lieu->close();

            $connexion->close();
        ?>
    </div>
  <!-- JavaScript Libraries -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>

  <!-- Template Main Javascript File -->
  <script src="js/main.js"></script>

</body>
</html>