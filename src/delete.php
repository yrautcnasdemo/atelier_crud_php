<?php
//On vérifie qu'il y a bien une ID dans l'URL et que l'utilisateur correspondant existe
if(isset($_GET["id"]) && !empty ($_GET["id"])){

    require_once("connect.php");

    $id = strip_tags($_GET["id"]);
    $sql = "SELECT * FROM users WHERE id = :id";
    $query = $db->prepare($sql);
    //On accroche la valeur id de la requête a celle de la variable de $id
    $query->bindValue(":id", $id, PDO::PARAM_INT);
    $query->execute();
    $user = $query->fetch();

    //on vérifie si l'utilisateur existe
        if(!$user){
            header("Location: index.php");
        } else {
            //On gere la suppression de l'utilisateur
            $sql = "DELETE FROM users WHERE id = :id";
            $query = $db->prepare($sql);
            $query->bindValue(":id", $id, PDO::PARAM_INT);
            $query->execute();
            header("Location: index.php");
        }


} else {
header("Location: index.php");
}