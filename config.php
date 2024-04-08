<?php
require_once('class.billet.php');




define('CONNECT', 'mysql:localhost;dbname=reservation_billets;charset=utf8');
define('USER', 'root');
define('PASSWORD', '');

try {

    $connexion = new PDO(CONNECT, USER, PASSWORD);
    echo 'nickel';
//instanciation de la class Billet ////????................................................................
                                                                                                       //|
                                                                                                       //|
$date_heure_depart = '';                                                                              //\|
$statut ='';                                                                                         //-\|    
$id_client ='';                                                                                     //__\|        
$id_reservation = '';                                                                              //\\|||     
$billet =new Billet($connexion,$date_heure_depart, $statut, $id_client, $id_reservation);         //\\\\\|
///........................................................................................................
} catch (PDOException $erreur) {
    die('Erreur de connexion : ' . $erreur->getMessage());
}
