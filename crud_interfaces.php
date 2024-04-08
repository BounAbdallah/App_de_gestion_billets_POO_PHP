<?php

interface IBillet{
    public function create($date_heure_depart, $statut, $id_client, $id_reservation);
    public function read();
    public function update($id, $date_heure_depart, $statut, $id_client, $id_reservation);
    public function delete($id);
}