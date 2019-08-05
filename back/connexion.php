<?php
    /**
     * connexion à la base donnée avec mysqli
     */
    $connexion = new mysqli("localhost" , "root", "", "evenemment");

    if( $connexion->connect_error ) {
        die("ERROR: Impossible de conneter: " . $conn->connect_error);
    }
