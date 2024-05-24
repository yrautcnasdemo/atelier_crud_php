<?php

require_once("connect.php");

    $id = strip_tags($_GET["id"]);
    $sql = "SELECT * FROM users WHERE id = :id";
    $query = $db->prepare($sql);
    //On accroche la valeur id de la requête a celle de la variable de $id
    $query->bindValue(":id", $id, PDO::PARAM_INT);
    $query->execute();
    $user = $query->fetch();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>page de <?= $user["first_name"] . " " . $user["last_name"]?></title>
</head>
<body>
    <h1>Bonjour <?= $user["first_name"] . " " . $user["last_name"]?></h1>
</body>
</html>