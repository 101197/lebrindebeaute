<?php
function getUser($piduser, $bdd){
  //selectionne l'utilisateur grace a son id
  $requser = $bdd->prepare("SELECT Nom, Prenom, Mail, Pseudo, Telephone, Statut FROM client WHERE IDClient = ?");
  $requser->execute(array($piduser));
  $userinfo = $requser->fetch();
  //instancie un nouvel utilisateur
  $unclient = new Client;
  $unclient->setNomClient($userinfo['Nom']);
  $unclient->setPrenomClient($userinfo['Prenom']);
  $unclient->setMailClient($userinfo['Mail']);
  $unclient->setPseudoClient($userinfo['Pseudo']);
  $unclient->setTelephoneClient($userinfo['Telephone']);
  $unclient->setStatutClient($userinfo['Statut']);

  //renvoi le client
  return $unclient;
} ?>
