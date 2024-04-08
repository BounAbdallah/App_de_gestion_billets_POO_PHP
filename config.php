<?php

include_once('client.php'); // Ajout de cette ligne pour inclure la définition de la classe Client

define('DB_SERVER', 'localhost');
define('DB_USERNAME','root');
define('DB_PASSWORD','');
define('DB_NAME','reservation_billets');

try {
    // Connexion à la base de données avec PDO
    $connexion = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
    // Configuration des attributs de la connexion PDO pour afficher les erreurs
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // // Création d'une instance de la classe Client
     $client = new Client($connexion,'Mendy', 'Célina', 'Célina.mendy@gmail.com','ouakam','782468437');

    // // Exemple d'utilisation : création d'un nouveau client
    //   $adresse = '';
} catch(PDOException $e) {
    // En cas d'erreur de connexion, afficher le message d'erreur
    die("La connexion à la base de données a échoué : " . $e->getMessage());
}

?>- 
