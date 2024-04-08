

<?php require_once("config.php") 



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="top-bar">
        <h1>Agence de voyage La Paix </h1>
    </div>
    <div class="nav-bar">
        <div class="logo">##LOGO##</div>
        <div class="navigation">
            <a href="#">Ajouter un client</a>
            <a href="#">Enregisttrer une reservation</a>
            <a href="ajouter.billet.php">Ajouter un billet</a>
            <a href="#">Voir les reservation </a>
        </div>
    </div>
    <div class="contenaire">
       
      
    <?php foreach ($billets as $billet) : ?>
    <div class="card">
        <span>prenom:</span>
        <span>Telephone: <?php echo $billet->getIdClient(); ?> </span>
        <span>Statut: <?php echo $billet->getStatut(); ?></span>
        <span>Date:  <?php echo $billet->getDateHeureDepart(); ?></span>
        <span>email:</span>
        <div class="button">
            <!-- Lien pour supprimer un billet -->
            <span><a href="delete_billet.php?id=<?php echo $billet->getIdClient(); ?>">Supprimer</a></span>
            <span><a href="upadate.php?id=<?php echo $billet->getIdClient(); ?>">Modifier</a></span>
            <!-- Lien pour modifier un billet -->
            <span><a href="#"></a></span>
        </div>
    </div>
<?php endforeach; ?>


    </div>

   

</body>
</html>