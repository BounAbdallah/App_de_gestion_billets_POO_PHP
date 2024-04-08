<?php
require_once("config.php");


if($_SERVER["REQUEST_METHOD"] == "POST"){
        // LA RECUPERATION DE INFORMATION DU FORMULAIRE

        $date_heure_depart = htmlspecialchars($_POST["date_heure_depart"]);
        $statut = htmlspecialchars($_POST["statut"]);
        // $id_client = htmlspecialchars($_POST["id_client"]);
        $id_reservation = htmlspecialchars($_POST["id_reservation"]);
        if($date_heure_depart != "" && $statut != "" ){
            $billet->create($date_heure_depart, $statut, $id_client, $id_reservation);
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



            <?php foreach ($billets as $billet) : ?>
    <?php echo $billet->getStatut(); ?>
    <?php echo $billet->getDateHeureDepart(); ?>
    <?php echo $billet->getIdReservation(); ?>
<?php endforeach; ?>
           <label for="id_reservation">La reservation :</label>
<select type='text' name="id_reservation" id="id_reservation">
    <option value="">Choisis la reservation </option>
    <?php foreach ($billets as $billet) : ?>
        <option value="<?php echo $billet->getIdReservation(); ?>"><?php echo $billet->getIdReservation(); ?></option>
    <?php endforeach; ?>
</select>

<label for="id_client">Le client :</label>
<select type='text' name="id_client" id="id_client">
    <option value="">Choisis le client</option>
    <?php foreach ($billets as $billet) : ?>
        <option value="<?php echo $billet->getIdClient(); ?>"><?php echo $billet->getIdClient(); ?></option>
    <?php endforeach; ?>
</select>



            <button type="submit">Enregistré</button>
        </form>
</body>
</html>