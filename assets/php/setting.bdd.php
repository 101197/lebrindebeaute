<?php
  //session_start();

  try {
    $bdd = new PDO('mysql:host=localhost;dbname=brindebeaute', 'root', '');
  } catch (Exception $e) {
    echo 'Erreur de connexion à la bdd : '.$e->getMessage();
    die();
  }
?>
