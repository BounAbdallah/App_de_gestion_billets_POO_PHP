<?php 

require_once('crud_interfaces.php');
require_once('traitDeValidation.php');

class Billet implements IBillet{
    USE Validation;

    private $connexion;
    private $date_heure_depart;
    private $statut;
    private $id_client;
    private $id;
    private $prenom;
    private $email;
    private $clientNom;
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

public function getPrenom()
{
    return $this->prenom;
}
public function getClientNom(){
    return $this->clientNom;
}
public function getId()
{
    return $this->id;
}
public function getEmail()
{
    return $this->id_client;
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
        $sql = "INSERT INTO billets (date_heure_depart, statut, id_client, id_reservation) VALUES (:date_heure_depart, :statut, :id_client, :id_reservation)";
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
            $sql = "SELECT r.*, c.nom, c.prenom, c.email, b.statut AS billet_statut
            FROM billets AS r
            INNER JOIN clients AS c ON r.id_reservation = c.id_client
            INNER JOIN reservation AS b ON r.id_reservation = b.id_reservation";
    
            $affichage = $this->connexion->prepare($sql);
            $affichage->execute();
            $rows = $affichage->fetchAll(PDO::FETCH_ASSOC);
            $billets = array();
            foreach ($rows as $row) {
                // Utilisation de $row['id_client'] pour la colonne id_client
                $billet = new Billet($this->connexion, $row['date_heure_depart'], $row['billet_statut'], $row['id_client'], $row['id_reservation']);
                $billets[] = $billet;
            }
            return $billets;
        } catch (PDOException $e) {
            die("Erreur !: " . $e->getMessage() . "<br/>");
        }
    }
    
    public function update($id, $date_heure_depart, $statut, $id_client, $id_reservation){
        try {
            $sql = "UPDATE billets SET date_heure_depart = :date_heure_depart, statut = :statut, id_client = :id_client, id_reservation = :id_reservation WHERE id = :id";
            $req = $this->connexion->prepare($sql);
            $req->bindValue(':id', $id, PDO::PARAM_INT);
            $req->bindValue(':date_heure_depart', $date_heure_depart);
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
    public function delete($id_billet){
        try{
            $sql= "DELETE FROM billets WHERE id_billet = :id";
            $requete = $this->connexion->prepare($sql);
            $requete->bindValue(':id', $id_billet, PDO::PARAM_INT);
            $requete->execute();
            
            header("location: index.php");
            exit();
    
        } catch (PDOException $e) {
            die("Erreur !: " . $e->getMessage() . "<br/>");
        }
    }
    

    }



