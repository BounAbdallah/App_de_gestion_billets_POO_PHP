<?php
require_once("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // RECUPERATION DES INFORMATIONS DU FORMULAIRE
    $id = htmlspecialchars($_POST["id"]); // Ajoutez un champ caché dans votre formulaire pour stocker l'ID du billet à mettre à jour
    $date_heure_depart = htmlspecialchars($_POST["date_heure_depart"]);
    $statut = htmlspecialchars($_POST["statut"]);
    $id_client = htmlspecialchars($_POST["id_client"]);
    $id_reservation = htmlspecialchars($_POST["id_reservation"]);

    if ($date_heure_depart != "" && $statut != "" &&  $id_client != "" && $id_reservation != "") {
        // MISE A JOUR DU BILLET
        $update_billet = $billet->update($id, $date_heure_depart, $statut, $id_client, $id_reservation);
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mise à jour d'un billet</title>
</head>

<body>
    <h1>Mise à jour d'un billet</h1>

    <form method="post">
        <!-- Ajoutez un champ caché pour stocker l'ID du billet à mettre à jour -->
        <input type="hidden" name="id" value="<?php echo $id; ?>">

        <label for="date">Date de départ :</label>
        <input type="datetime-local" id="date_heure_depart" name="date_heure_depart" required>

        <label for="statut">Statut :</label>
        <select name="statut" id="statut" required>
            <option value="confirmée">Confirmée</option>
            <option value="en attente">En attente</option>
            <option value="annulée">Annulée</option>
        </select>

        <!-- Sélection de la réservation -->
        <label for="id_reservation">Sélectionner la réservation :</label>
        <select name="id_reservation" id="id_reservation">
            <option value="">Choisissez la réservation</option>
            <?php foreach ($reservations as $reservation) : ?>
                <option value="<?php echo $reservation->id_reservation; ?>"><?php echo $reservation->id_reservation; ?></option>
            <?php endforeach; ?>
        </select>

        <!-- Sélection du client -->
        <label for="id_client">Sélectionner le client :</label>
        <select name="id_client" id="id_client">
            <option value="">Choisissez le client</option>
            <?php foreach ($clients as $client) : ?>
                <option value="<?php echo $client->id_client; ?>"><?php echo $client->nom; ?> <?php echo $client->prenom; ?></option>
            <?php endforeach; ?>
        </select>

        <button type="submit">Enregistrer</button>
    </form>
</body>

</html>
