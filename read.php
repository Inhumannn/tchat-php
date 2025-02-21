<?php
// Connection à la base de données
require_once("connect.php");

// Préparation de la requête SQL à la table "tchat"
$tchat = $db->prepare('SELECT * FROM tchat ORDER BY id_tchat ASC');

// Afficher le résultat de la requête SQL

$tchat->execute(); // Exécution de la requête
// Récupérer les données que renvois la requête
$result = $tchat->fetchAll(); // Va chercher tous les résultats de la requête

foreach($result as $msg){
    echo '<p>Message de '.$msg['pseudo_tchat']. ' : '.$msg['message_tchat'].'</p>';
}

// On test pour voir si on obtient bien des résultats
// var_dump($result);

// Préparer une requête en transmettant une variable
// Exemple : récupérer les messages de l'utilisateur "Jack"
// $tchat = $db->prepare('
//     SELECT pseudo_tchat, message_tchat
//     FROM tchat
//     WHERE pseudo_tchat = :pseudo
//     ORDER BY id_tchat ASC
//     ');
// // Exécuter la requête préparée
// // $name = $_GET['name'];
// $name = "Jack";
// $tchat->execute(array(
//     'pseudo' => $name
// ));
// $result = $tchat->fetchAll();

// foreach($result as $msg) {
//     echo '<p>Message de '.$msg['pseudo_tchat']. ' : '.$msg['message_tchat'].'</p>';
// }