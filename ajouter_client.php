<?php
require_once "config.php";
require_once "client.php";

// Vérification si le formulaire est soumis
if(isset($_POST['submit'])) {
    // Récupération des données du formulaire
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $adresse = $_POST['adresse'];
    $telephone = $_POST['telephone'];

    // Création d'une nouvelle instance de la classe Client
    $client = new Client($connexion, $nom, $prenom, $email, $adresse, $telephone);

    // Appel de la méthode create() pour ajouter le client à la base de données
    if($client->create($nom, $prenom, $email, $adresse, $telephone)) {
        // Redirection vers la page principale après l'ajout
        header("Location: index.php");
        exit();
    } else {
        echo "Erreur lors de l'ajout du client.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un client</title>
    <!-- Inclusion du CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <h1>Ajouter un client</h1>
    <form method="post" action="">
        <div class="mb-3">
            <label for="nom" >Nom :</label><br>
            <input type="text"  id="nom" name="nom" required><br>
        </div>
        <div class="mb-3">
            <label for="prenom" >Prénom :</label><br>
            <input type="text" id="prenom" name="prenom" required><br>
        </div>
        <div class="mb-3">
            <label for="email" >Email :</label><br>
            <input type="email" id="email" name="email" required><br>
        </div>
        <div class="mb-3">
            <label for="adresse">Adresse :</label><br>
            <input type="text"   id="adresse" name="adresse" required><br>
        </div>
        <div class="mb-3">
            <label for="telephone" >Téléphone :</label><br>
            <input type="text" id="telephone" name="telephone" required><br><br>
            </div>
            <input type="submit" class="btn btn-primary" name="submit" value="Ajouter">
        
    </form>
</body>
</html>

