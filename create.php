<?php
$message = null;
// Si l'utilisateru à envoyer un message
if(!empty($_POST["message"]) && !empty($_POST["pseudo"])){
    // On doit se connecter à la base de données
    require_once('connect.php');

    // Ajouter des données à la base de données sur la table tchat
    // INSERT INTO table(champs1, champs2, champs3, etc.) VALUES(champs1, champs2, champs3, etc.)
    $requete = "INSERT INTO tchat(pseudo_tchat, message_tchat) VALUES(:pseudo, :msg)";

    // Préparation de la requête
    // $tchat = $db->prepare("INSERT INTO tchat(pseudo_tchat, message_tchat) VALUES(:pseudo, :msg)");
    $tchat = $db->prepare($requete);

    // Execution de la requête
    // Imagnons qu  e les données viennent d'un formulaire en méthode post
    $tchat->execute(array(
        'pseudo' => $_POST['pseudo'],
        'msg' => $_POST['message']
    ));

    // $tchat->execute(array(
    //     'pseudo' => "Paul",
    //     'msg' => "Coucou, c'est Paul !"
    // ));

    $message = "<p>Le message à été ajouté à la base de données</p>";
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout message</title>
</head>
<body>
    <form action="#" method="POST">
        <label for="pseudo">Pseudo</label>
        <input type="text" name="pseudo" id="pseudo" required> <br>

        <label for="message">Message : </label>
        <input type="text" name="message" id="message" required> <br>

        <input type="submit" value="Envoyer le message">
    </form>
    <?=$message?>

    <h1>Les message : </h1>
    <?php include_once('read.php'); ?>
</body>
</html>