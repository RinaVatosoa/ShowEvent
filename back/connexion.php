<?php
    /**
     * connexion à la base donnée avec mysqli
     */
    $connexion = new mysqli("localhost" , "root", "", "evennement");

    if( $connexion->connect_error ) {
        die("ERROR: Impossible de conneter à la base de donnée: " . $connexion->connect_error);
    }
