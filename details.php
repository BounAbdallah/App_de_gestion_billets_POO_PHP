<?php

require_once('config.php');



// Vérifier si l'ID du billet est défini et est un entier valide
$id = isset($_GET['id']) ? intval($_GET['id']) : null;

if ($id === null || $id <= 0) {
    // Gérer le cas où l'ID du billet n'est pas valide
    echo "ID de billet non valide.";
    exit;
}

// Récupérer les détails du billet en fonction de l'ID
$detail_billet = $billet->afficherDetails($id);

if (!$detail_billet) {
    // Gérer le cas où aucun détail de billet n'est trouvé pour l'ID donné
    echo "Détails de billet non trouvés pour l'ID donné.";
    exit;
}
?>

<?php require('header.php') ?>

<div class="container">
    <div class="billet-container">
        <a href="index.php" class="retour-link">Retour à la liste des billets</a>
        <div class="billet">
            <h1 class="billet-title">Les détails du billet de <?= ucfirst($detail_billet['prenom']); ?> <?= ucfirst($detail_billet['nom']); ?></h1>
            <ul class="billet-details">
                <li>
                    Nom du client : <?= $detail_billet['nom']; ?>
                </li>
                <li>
                    Prénom du client : <?= $detail_billet['prenom']; ?>
                </li>
                <li>
                    Adresse électronique : <?= $detail_billet['email']; ?>
                </li>
                <li>
                    Adresse postale : <?= $detail_billet['adresse']; ?>
                </li>
                <li>
                    Numéro Téléphone : <?= $detail_billet['telephone']; ?>
                </li>
                <li>
                    Date et heure de réservation : <?= $detail_billet['date_heure_reservation']; ?>
                </li>
                <li>
                    Prix : <?= $detail_billet['prix']; ?> FCFA
                </li>
                <li>
                    Statut : <?= $detail_billet['statut']; ?>
                </li>
                <li>
                    Trajet : <?= $detail_billet['trajet']; ?>
                </li>
                <li>
                    Heure de départ : <?= $detail_billet['heure_depart']; ?>
                </li>
                <li>
                    Heure d'arrivée prévue : <?= $detail_billet['heure_arrivee']; ?>
                </li>
                <li>
                    Compagnie : <?= $detail_billet['compagnie']; ?>
                </li>
            </ul>
        </div>
    </div>
</div>

<?php require('footer.php') ?>