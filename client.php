<?php

require_once('crud_interface.php');
require_once ('validation_trait.php');
class Client implements Iclient {
    private $connexion;
    private $id;
    private $nom;
    private $prenom;
    private $email;
    private $adresse;
    private $telephone;

    // Constructeur
    public function __construct($connexion, $nom, $prenom, $email, $adresse, $telephone) {
        $this->connexion = $connexion;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->adresse = $adresse;
        $this->telephone = $telephone;
    }

    // Méthodes Getter
    public function getId() {
        return $this->id;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getPrenom() {
        return $this->prenom;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getAdresse() {
        return $this->adresse;
    }

    public function getTelephone() {
        return $this->telephone;
    }

    // Méthodes Setter
    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function setPrenom($prenom) {
        $this->prenom = $prenom;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setAdresse($adresse) {
        $this->adresse = $adresse;
    }

    public function setTelephone($telephone) {
        $this->telephone = $telephone;
    }

    // Méthodes CRUD
    public function create($nom, $prenom, $email, $adresse, $telephone) {
        try {
            // Préparation de la requête d'insertion
            $query = "INSERT INTO client (nom, prenom, email, adresse, telephone) VALUES (:nom, :prenom, :email, :adresse, :telephone)";
            $stmt = $this->connexion->prepare($query);
            
            // Liaison des valeurs aux paramètres de la requête
            $stmt->bindParam(":nom", $nom);
            $stmt->bindParam(":prenom", $prenom);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":adresse", $adresse);
            $stmt->bindParam(":telephone", $telephone);
            
            // Exécution de la requête
            $stmt->execute();
            
            // Récupération de l'identifiant généré pour le nouveau client
            $this->id = $this->connexion->lastInsertId();
    
            return true; // Succès
        } catch(PDOException $e) {
            // En cas d'erreur, afficher l'erreur et renvoyer false
            echo "Erreur lors de la création du client : " . $e->getMessage();
            return false;
        }
    }
    
    public function read() {
        try {
            // Préparation de la requête de sélection
            $query = "SELECT * FROM clients";
            $stmt = $this->connexion->prepare($query);
            
            // Exécution de la requête
            $stmt->execute();
            
            // Récupération des résultats
            $clients = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            // Renvoi du résultat de la requête
            header("location: index.php");
            return $clients;
        } catch(PDOException $e) {
            // En cas d'erreur, afficher l'erreur et renvoyer false
            echo "Erreur lors de la lecture du client : " . $e->getMessage();
            return false;
        }
    }
    
    
    public function update($id_client, $nom, $prenom, $email, $adresse, $telephone) {
        try {
            // Préparation de la requête de mise à jour
            $query = "UPDATE client SET nom = :nom, prenom = :prenom, email = :email, adresse = :adresse, telephone = :telephone WHERE id_client = :id";
            $stmt = $this->connexion->prepare($query);
            
            // Liaison des valeurs aux paramètres de la requête
            $stmt->bindParam(":id", $id_client);
            $stmt->bindParam(":nom", $nom);
            $stmt->bindParam(":prenom", $prenom);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":adresse", $adresse);
            $stmt->bindParam(":telephone", $telephone);
            
            // Exécution de la requête
            $stmt->execute();
    
            return true; // Succès
        } catch(PDOException $e) {
            // En cas d'erreur, afficher l'erreur et renvoyer false
            echo "Erreur lors de la mise à jour du client : " . $e->getMessage();
            return false;
        }
    }
    
    
    public function delete() {
        try {
            // Préparation de la requête de suppression
            $query = "DELETE FROM client WHERE id = :id";
            $stmt = $this->connexion->prepare($query);
            
            // Liaison de la valeur du paramètre :id à l'identifiant du client
            $stmt->bindParam(":id", $this->id);
            
            // Exécution de la requête
            $stmt->execute();
    
            return true; // Succès
        } catch(PDOException $e) {
            // En cas d'erreur, afficher l'erreur et renvoyer false
            echo "Erreur lors de la suppression du client : " . $e->getMessage();
            return false;
        }
    }
    
}

?>
