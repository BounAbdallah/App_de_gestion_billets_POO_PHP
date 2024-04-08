<?php 

require_once('crud_interfaces.php');
require_once('traitDeValidation.php');

class Billet implements IBillet{
    USE Validation;

    private $connexion;
    private $date_heure_depart;
    private $statut;
    private $id_client;

    private $id_reservation;


///Le constructor \\\\


public function __construct($connexion, $date_heure_depart, $statut, $id_client, $id_reservation){
    $this->connexion = $connexion;
    $this->date_heure_depart = $date_heure_depart;
    $this->statut = $statut;
    $this->id_client = $id_client;
    $this->id_reservation = $id_reservation;
}


// Getters
public function getConnexion() {
    return $this->connexion;
}

public function getDateHeureDepart() {
    return $this->date_heure_depart;
}

public function getStatut() {
    return $this->statut;
}

public function getIdClient() {
    return $this->id_client;
}

public function getIdReservation() {
    return $this->id_reservation;
}

// Setters
public function setConnexion($connexion) {
    $this->connexion = $connexion;
}

public function setDateHeureDepart($date_heure_depart) {
    $this->date_heure_depart = $date_heure_depart;
}

public function setStatut($statut) {
    $this->statut = $statut;
}

public function setIdClient($id_client) {
    $this->id_client = $id_client;
}

public function setIdReservation($id_reservation) {
    $this->id_reservation = $id_reservation;
}



    public function create($date_heure_depart, $statut, $id_client, $id_reservation){
        try{
            $sql = "INSERT INTO billets (date_heure_depart, statut, id_client, id_reservation) VALUES (':date_heure_depart', :statut, :id_client, :id_reservation)";
            $requete = $this->connexion->prepare($sql);
            $requete->bindParam(':date_heure_depart', $date_heure_depart);
            $requete->bindParam(':statut', $statut);
            $requete->bindParam(':id_client', $id_client, PDO::PARAM_INT);
            $requete->bindParam(':id_reservation', $id_reservation, PDO::PARAM_INT);

            $requete->execute();
            header("location: index.php");
            exit();

        }catch (PDOException $e){
            die("erreur : " . $e->getMessage());
        }

    }
    
    public function read(){
        try{
            $sql = "SELECT billets.id, nom, prenom, telephone
            FROM billets
            JOIN clients ON billets.id_client = clients.id
            order by billets.id;
            ";

            $affichage =$this->connexion->prepare($sql);
            $affichage->execute();
            $billets = $affichage->fetchall(PDO::FETCH_OBJ);
            return $billets;
        } catch (PDOException $e) {
            die("Erreur !: " . $e->getMessage() . "<br/>");
        }

    }
    public function update($id, $date_heure_depart, $statut, $id_client, $id_reservation){
        try {
            $sql = "UPDATE billets SET date_heure_reservation = :date_heure_reservation , statut = :statut , id_client = :id_client, id_reservation = :id__trajet WHERE id = :id";
            $req = $this->connexion->prepare($sql);
            $req->bindValue(':id', $id, PDO::PARAM_INT);
            $req->bindValue(':date_heure_reservation', $date_heure_depart);
            $req->bindValue(':statut', $statut);
            $req->bindValue(':id_client', $id_client, PDO::PARAM_INT);
            $req->bindValue(':id_reservation', $id_reservation, PDO::PARAM_INT);
            $req->execute();
            
            // Redirection après la mise à jour
              header("location: index.php");
              exit();
    
          
        } catch (PDOException $e) {
            die("Erreur !: " . $e->getMessage() . "<br/>");
        }

    }
    public function delete($id){
        try{
            $sql= "DELETE FROM  billets WHERE id =:id ";
            $requete = $this->connexion->prepare($sql);
            $requete->bindValue(':id', $id, PDO::PARAM_INT);
            $requete->execute();
            
            header("location: index.php");
            exit();
    
        } catch (PDOException $e) {
            die("Erreur !: " . $e->getMessage() . "<br/>");
        }
        }

    }



