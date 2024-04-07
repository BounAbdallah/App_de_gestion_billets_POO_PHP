<?php
interface Iclient
{
public function create($nom , $prenom ,$email ,$adresse ,$telephone);
public function read();
public function update($id_client ,$nom , $prenom ,$email ,$adresse ,$telephone);
public function delete();
}
?>