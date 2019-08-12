<?php
    /**
     * connexion à la base donnée avec mysqli

    $connexion = new mysqli(
        "localhost" ,
        "root",
        "",
        "evennement");
    if( $connexion->connect_error ) {
        die("ERROR: Impossible de conneter à la base de donnée: " . $connexion->connect_error);
    }

*/
    $connexion = new mysqli("127.0.0.1", "root", "", "evennement");
    if($connexion->connect_error) {
        exit('Error connecting to database');
    }
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $connexion->set_charset("utf8mb4");