<?php

    include_once "connexion.php";

    $id_info = '';
    if( isset( $_POST['id_info'])) {
        $id_info = $_POST['id_info'];
    }

    $ge= "SELECT reservation, lieu FROM information WHERE id_info=$id_info ";
    $res = $connexion->query($ge);
    $a = mysqli_fetch_array($res);
    
    $nouvelleRes = mysqli_real_escape_string(
        $connexion, 
        $_POST['reservation']
    );
    $b = $a[0] + $nouvelleRes;

    if (isset($_POST["reservation"])) {

        $sql = "UPDATE `information` SET `reservation` = $b WHERE `information`.`id_info` = $id_info";
        if ($connexion->query($sql) === TRUE) {
            echo "Mise à jour avec succès";
        } else {
            echo "error" . $sql . "<br>" . $connexion->error;
        }
    }
    $connexion->close();
