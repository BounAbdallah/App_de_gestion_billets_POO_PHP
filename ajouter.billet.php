<?php
require_once("config.php");


if($_SERVER["REQUEST_METHOD"] == "POST"){
        // LA RECUPERATION DE INFORMATION DU FORMULAIRE

        $date_heure_depart = htmlspecialchars($_POST["date_heure_depart"]);
        $statut = htmlspecialchars($_POST["statut"]);
        $id_client = htmlspecialchars($_POST["id_client"]);
        $id_reservation = htmlspecialchars($_POST["id_reservation"]);

        if($date_heure_depart != "" && $statut != "" &&  $id_client != "" && $id_reservation != ""){
            $ajout_billet = $billet->create($date_heure_depart, $statut, $id_client, $id_reservation);
        }
}?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout d'un billet</title>
</head>
<body>
        <h1>Ajout de billet</h1>

        <form  method="post">
            <label for="date">Date de reservation : </label>
            <input type="datetime-local" id="date_heure_depart" name="date_heure_depart" required>

            <label for="statut">Statut :</label>
            <select type="text" name="statut" id="statu" required>
                <option value="confirmer">Confirmer</option>
                <option value="en attente">En attente</option>
                <option value="annuler">Annuler</option>
            </select>

            <!-- ////\\\\ -->

            <label for="id_reservation">La reservation :</label>
            <select type='text' name="id_reservation" id="id_reservation" >
                <option value="">Choisis la reservation </option>
                <?php foreach ($reservations as $reservation) : ?>
                    <option value="<?php echo $reservation->id; ?>"><?php echo $reservation->reservation; ?> <?php echo $reservation->reservation?> <?php ?></option>
                <?php endforeach; ?>
            </select>

            <label for="id_reservation">Le client :</label>
            <select type='text' name="id_reservation" id="id_reservation" >
                <option value="">Choisis le client</option>
                <?php foreach ($clients as $client) : ?>
                    <option value="<?php echo $client->id; ?>"><?php echo $client->nom; ?> <?php echo $client->prenom?> <?php ?></option>
                <?php endforeach; ?>
            </select>


            <button type="submit">Enregistré</button>
        </form>
</body>
</html>