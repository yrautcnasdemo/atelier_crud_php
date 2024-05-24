<?php 
    const DBHOST = "db"; //correspond a db du fichier "Docker-compose.yml"
    const DBNAME = "atelier_crud"; //correspond a MySQL DATABASE du fichier "Docker-compose.yml"
    const DBUSER = "test"; //correspond a MySQL USER du fichier "Docker-compose.yml"
    const DBPASS = "test"; //correspond a MySQL PASSWORD du fichier "Docker-compose.yml"

$dsn = "mysql:host=" . DBHOST . ";dbname=" . DBNAME . ";charset=utf8";

    //TRY CATCH, on TRY de se connecter et cela ne marche on CATCH le messaged'erreur
    try {
        $db = new PDO($dsn, DBUSER, DBPASS);
        echo "Connexion réussi" . "<br>";
    } catch(PDOException $error) {
        echo "Echec de la connexion: " . $error->getMessage() . "<br>";
    }

    //Ici on a notre request
    $sql = "SELECT * FROM users";

    //On prépare la requête
    $query = $db->prepare($sql);
    //on exécute la requête
    $query->execute();
    //on récupère les données sous forme de tableau associatif
    $users = $query->fetchAll(PDO::FETCH_ASSOC);

    print_r($users);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atelier CRUD</title>
</head>
<body>
    <h1>Liste des utilisateurs</h1>
    <table>
        <thead>
            <td>id</td>
            <td>Prénom</td>
            <td>Nom</td>
        </thead>
        <tbody>
            <tr>
                <td>0</td>
                <td>bob</td>
                <td>lebricoleur</td>
            </tr>
        </tbody>
    </table>
</body>
</html>