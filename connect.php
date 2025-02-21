<?php
// Effectuer une connexion à la base de données
try {
// PDO : 
    // Premier argument :
        // Type de base de données (MySQL)
        // Adresse du serveur de base de données (localhost)
        // nom de la base de données (crud2025)
        // le type d'encodage (utf8)
    // Deuxième argument :
        // Nom d'utilisateur de la base de données
    // Troisième argument : 
        // Mot de passe de la base de données
    // Quatrième argument (optionnel) : 
        // Un tableau (notamment pour la gestion des erreurs)
    $db = new PDO(
        'mysql:host=localhost;dbname=crud2025;charset=utf8',
        'Thomas2',
        'pass1234',
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION // Active la gestion des erreurs
        ]
    );
} catch (Exception $e){
    // die permet de "tuer" le script, il n'y a rien qui va s'aficher après cela
    die("Erreur : ".$e->getMessage());
}