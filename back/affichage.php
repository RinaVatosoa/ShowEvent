<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Evénemment à Antananarivo</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">
</head>

<body>
    <div>
        <?php
            include_once "connexion.php";

            $stmt = $connexion->prepare("SELECT * FROM information");
            $stmt->bind_param( "issssis");
            $stmt->execute();
            $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
            if(!$result) exit('No rows');
            var_export($result);
            $stmt->close();

            $connexion->close();
        ?>
    </div>

</body>
</html>