<?php
    // Nous devons renvoyer sur la même page
        // Voir le formulaire de modification | prérempli avec les données existantes
        // Mettre à jour les donnée
        // l'édition ne doit pas voir la liste des messages (on ne doit voir qu le formulaire)
// Mise à jour des données
    if(!empty($_POST['pseudo']) && !empty( $_POST['message']) && !empty($_GET['id'])){
        // Connexion à la base de données
        require_once('connect.php');
        // Ecrire la requête
        $requete = "UPDATE tchat SET message_tchat = :msg, pseudo_tchat = :pseudo WHERE id_tchat = :id";
        // Preparer la requête
        $tchat = $db->prepare($requete);
        // Executer la requête avec l'ajout de paramètres
        $tchat->execute(array(
            'msg' => $_POST['message'],
            'pseudo' => $_POST['pseudo'],
            'id' => $_GET['id']
        ));
        // Après mise à jour, redirection (header location) sur update.php
        header('location: update.php');
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="5">
    <title>Update</title>
</head>
<body>
    <?php if(empty($_GET['id'])): ?>
        <h1>Messages : </h1>
        <?php include_once('readelete.php'); ?>
    <?php endif; ?>

    <?php if(!empty($_GET['id'])): ?>
        <?php 
            require_once('connect.php');
            $msg = $db->prepare('SELECT pseudo_tchat, message_tchat FROM tchat WHERE  id_tchat = :id');
            $msg->execute(array("id"=>$_GET['id']));
            $data = $msg->fetch();

        ?>
    <h1>Modification : </h1>
    <form action="#" method="POST">
        <label for="pseudo">Pseudo</label>
        <input type="text" name="pseudo" id="pseudo" required value="<?=$data['pseudo_tchat']?>">

        <label for="message">Message : </label>
        <input type="text" name="message" id="message" required value="<?=$data['message_tchat']?>">

        <input type="submit" value="Envoyer le message">
    </form>
    <?php endif; ?>
</body>
</html>