<?php
require_once('config.php');
$id_billet = $_GET['id']; // Assurez-vous que $_GET['id'] contient l'ID du billet à supprimer
$billet->delete($id_billet);
