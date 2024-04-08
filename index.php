<?php
require_once "client.php";
require_once "config.php";

$liste_clients = array(); // Initialisation de la variable $liste_clients

try {
    // Connexion à la base de données
    $connexion = new PDO("mysql:host=localhost;dbname=reservation_billets", "root", ""); // Modifier avec vos informations de connexion
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Récupérer tous les clients de la base de données
    $query = "SELECT * FROM client";
    $result = $connexion->query($query);
    // Vérifier si des clients ont été récupérés
    if ($result !== false) {
        $liste_clients = $result->fetchAll(PDO::FETCH_ASSOC);
    } else {
        echo "Aucun client trouvé.";
    }

    // Parcourir la liste des clients et créer une instance de la classe Client pour chaque client
    foreach ($liste_clients as $client_info) {
        $client = new Client($connexion, $client_info['nom'], $client_info['prenom'], $client_info['email'], $client_info['adresse'], $client_info['telephone']);
        // Utiliser l'instance de client si nécessaire
    }

} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Clients</title>
    <!-- Inclusion du CSS Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Liste des Clients</h1>
        <!-- Bouton pour ajouter un nouveau client -->
        <a href="ajouter_client.php" class="btn btn-primary">Ajouter</a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Id_client</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">Email</th>
                    <th scope="col">Adresse</th>
                    <th scope="col">Téléphone</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($liste_clients as $client) : ?>
                    <tr>
                        <td><?php echo $client['id_client']; ?></td>
                        <td><?php echo $client['nom']; ?></td>
                        <td><?php echo $client['prenom']; ?></td>
                        <td><?php echo $client['email']; ?></td>
                        <td><?php echo $client['adresse']; ?></td>
                        <td><?php echo $client['telephone']; ?></td>
                        <td>
                            <!-- Boutons pour supprimer et modifier les clients -->
                            <a href="supprimer_client.php?id=<?php echo $client['id_client']; ?>" class="btn btn-danger">Supprimer</a>
                            <a href="modifier.php?id=<?php echo $client['id_client']; ?>" class="btn btn-primary">Modifier</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
