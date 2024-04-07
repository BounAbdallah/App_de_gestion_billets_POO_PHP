<?php

require_once('client.php'); // Ajout de cette ligne pour inclure la définition de la classe Client

define('DB_SERVER', 'localhost');
define('DB_USERNAME','root');
define('DB_PASSWORD','');
define('DB_NAME','reservation_billets');

try {
    // Connexion à la base de données avec PDO
    $connexion = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
    // Configuration des attributs de la connexion PDO pour afficher les erreurs
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connexion réussie à la base de données <br>";

    // // Création d'une instance de la classe Client
    // $client = new Client($connexion,'Mendy', 'Célina', 'Célina.mendy@gmail.com','ouakam','782468437');

    // // Exemple d'utilisation : création d'un nouveau client
    // $nouveauClient = array(
    //     "nom" => "Mendy",
    //     "prenom" => "Célina",
    //     "email" => "Célina.mendy@gmail.com",
    //     "adresse" => "ouakam",
    //     "telephone" => "782468437"
    // );
    // $client->create('Mendy', 'Célina', 'Célina.mendy@gmail.com','ouakam','782468437');
    // echo "Nouveau client créé avec succès <br>";

    // // Exemple d'utilisation : lecture des informations d'un client
    // $clientId = 1; // Supposons que l'identifiant du client est 1
    // $clientInfo = $client->read($clientId);
    // echo "Informations du client avec l'identifiant $clientId : <br>";
    // print_r($clientInfo);
    // echo "<br>";

    // // Exemple d'utilisation : mise à jour des informations d'un client
    // $clientMisAJour = array(
    //     "nom" => "Mendy",
    //     "prenom" => "Célina",
    //     "email" => "Céline.mendy@gmail.com",
    //     "adresse" => "parcelle_unité_30",
    //     "telephone" => "771862086"
    // );
    // $client->update($clientId, $clientMisAJour);
    // echo "Informations du client avec l'identifiant $clientId mises à jour avec succès <br>";

    // // Exemple d'utilisation : suppression d'un client
    // $client->delete($clientId);
    // echo "Client avec l'identifiant $clientId supprimé avec succès <br>";
} catch(PDOException $e) {
    // En cas d'erreur de connexion, afficher le message d'erreur
    die("La connexion à la base de données a échoué : " . $e->getMessage());
}

?>
