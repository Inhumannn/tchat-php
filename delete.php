<?php
// Pour pouvoir faire le delete, il faut "sélectionner" l'élément qu'on veut supprimer
// Pour pouvoir sélectionner l'élément : 
    // Soit on le fait directement dans le code en mettant en dur l'ID
    // Soit on récupère l'id directement depuis l'utilisateur (get)

// S'exécute que si un id est présent dans l'url
if(!empty($_GET['id'])){
    require_once('connect.php');
    $requete = "DELETE FROM tchat WHERE id_tchat = :id";
    $tchat = $db->prepare($requete);
    $tchat->execute(array(
        //'id'=> 1 // Supprime le message avec l'id 1
        'id'=> $_GET['id'] // Supprime le message avec l'id récupéré depuis un formulaire get
    ));
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supprission</title>
</head>
<body>
    <h1>Messages :</h1>
    <?php include_once('readelete.php'); ?>
</body>
</html>