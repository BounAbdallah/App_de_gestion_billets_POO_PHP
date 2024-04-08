<?php
require_once('config.php');

$id =$_GET['id'];
$billet->delete($id);