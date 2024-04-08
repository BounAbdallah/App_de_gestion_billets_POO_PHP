<?php
require_once('class.billet.php'); // Assumant que class.billet.php définit la classe Billet

// Détails de connexion à la base de données (considérez l'utilisation de variables d'environnement pour la sécurité)
define('CONNECT', 'mysql:host=localhost;dbname=reservation_billets;charset=utf8');
define('USER', 'root');
define('PASSWORD', '');

try {
    $connexion = new PDO(CONNECT, USER, PASSWORD);
    // echo 'Connexion à la base de données réussie!';

    // Instanciation d'un nouvel objet Billet (en supposant que le constructeur attend des paramètres)
    $date_heure_depart = '';
    $statut = '';
    $id_client = '';
    $id_reservation = '';
    $billet = new Billet($connexion, $date_heure_depart, $statut, $id_client, $id_reservation);

    // Supposant que 'read' est une méthode dans la classe Billet qui récupère des billets depuis la base de données
    $billets = $billet->read(); // Appel de la méthode read() sur l'objet Billet
    if ($billets) {
        // Traiter les billets récupérés
        foreach ($billets as $billet) {
            // echo "Billet Statut: " . $billet->getStatut() . "<br>"; // Accès à la propriété statut de l'objet Billet
        }
    } else {
        echo "Aucun billet trouvé.";
    }

} catch (PDOException $erreur) {
    die('Erreur de connexion à la base de données : ' . $erreur->getMessage());
}

