<?php
session_start();

//connexion à la bdd
try {
  $bdd = new PDO('mysql:host=;dbname=id', 'id', 'mdp');
} catch (Exception $e) {
  echo 'Erreur de connexion à la bdd : '.$e->getMessage();
  die();
}
?>
