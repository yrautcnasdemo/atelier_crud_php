<?php 
    const DBHOST = "db"; //correspond a db du fichier "Docker-compose.yml"
    const DBNAME = "atelier_crud"; //correspond a MySQL DATABASE du fichier "Docker-compose.yml"
    const DBUSER = "test"; //correspond a MySQL USER du fichier "Docker-compose.yml"
    const DBPASS = "test"; //correspond a MySQL PASSWORD du fichier "Docker-compose.yml"

$dsn = "mysql:host=" . DBHOST . ";dbname=" . DBNAME . ";charset=utf8";

    //TRY CATCH, on TRY de se connecter et cela ne marche on CATCH le messaged'erreur
    try {
        $db = new PDO($dsn, DBUSER, DBPASS);
        // echo "Connexion réussi" . "<br>"; //l'écho peu produire une erreur avec le header() de la page create
    } catch(PDOException $error) {
        echo "Echec de la connexion: " . $error->getMessage() . "<br>";
    }