<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Modifier profil</title>
    <?php include 'assets/php/allcss.php'; ?>
  </head>
  <body>
    <?php
    include 'assets/php/nav.php';

    //verification droit d'acces
    if (isset($_SESSION['id'])) {

      if (!empty($_SESSION['id'])) {

        $idadmin = $_SESSION['id'];

      }

          //si le bouton valider est cliqué
          if (isset($_POST['formmodifierprofil'])) {
            //teste si les champs ne sont pas vides
            if (!empty($_POST['pseudo']) && !empty($_POST['mail']) && !empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['telephone'])) {

              //variables
              $pseudoadmin = htmlspecialchars($_POST['pseudo']);
              $mailadmin = htmlspecialchars($_POST['mail']);
              $nomadmin = htmlspecialchars($_POST['nom']);
              $prenomadmin = htmlspecialchars($_POST['prenom']);
              $telephoneadmin = htmlspecialchars($_POST['telephone']);

              //le PDO
              $reqadmin = $bdd->prepare("UPDATE `admin` SET `PseudoAdmin` = ?, `MailAdmin` = ?, `NomAdmin` = ?, `PrenomAdmin` = ?, `TelephoneAdmin` = ?, WHERE IDAdmin = ?");
              $reqadmin->execute(array($pseudoadmin, $mailadmin, $nomadmin, $prenomadmin, $telephoneadmin, $idadmin));

            } else {
              echo "Tous les champs doivent être complétés";
            }
          }

          if (isset($_POST['formsupprofil'])) {
            //variables
            $pseudoadmin = htmlspecialchars($_POST['pseudo']);
            $mailadmin = htmlspecialchars($_POST['mail']);
            $nomadmin = htmlspecialchars($_POST['nom']);
            $prenomadmin = htmlspecialchars($_POST['prenom']);
            $telephoneadmin = htmlspecialchars($_POST['telephone']);

            //le PDO
            $reqadmin = $bdd->prepare("DELETE FROM `admin` WHERE IDAdmin = ?");
            $reqadmin->execute(array($idadmin));
          }
          //charge les informations actuelles de l'admin
          $reqadmin = $bdd->prepare("SELECT * FROM admin WHERE IDAdmin = ?");
          $reqadmin->execute(array($_SESSION['id']));
          $dbrep = $reqadmin->fetch();


          //le resultat remplit les variables
          $pseudoadmin = $dbrep['PseudoAdmin'];
          $mailadmin = $dbrep['MailAdmin'];
          $nomadmin = $dbrep['NomAdmin'];
          $prenomadmin = $dbrep['PrenomAdmin'];
          $telephoneadmin = $dbrep['TelephoneAdmin'];
          ?>

<!-- FORMULAIRE -->

          <div class="container-fluid">
            <div class="bandeprincipale row">
              <div class="bg-white p-5 rounded my-4 my-lg-0" id="login-block">

                <div class="row register-form">
                  <div class="col-md-8 offset-md-2">

                    <form class="custom-form" method="post">
                      <h1>Modifier un administrateur</h1>
                      <div class="form-row form-group">
                        <div class="col-sm-4 label-column">
                          <label class="col-form-label">Pseudo :&nbsp;</label>
                        </div>
                        <div class="col-sm-6 input-column">
                          <input type="text" class="form-control" name="pseudo" value="<?php echo $dbrep['PseudoAdmin']; ?>">
                        </div>
                      </div>
                      <div class="form-row form-group">
                        <div class="col-sm-4 label-column">
                          <label class="col-form-label">Mail :&nbsp;</label>
                        </div>
                        <div class="col-sm-6 input-column">
                          <input type="text" class="form-control" name="mail" value="<?php echo $dbrep['MailAdmin']; ?>">
                        </div>
                      </div>
                      <div class="form-row form-group">
                        <div class="col-sm-4 label-column">
                          <label class="col-form-label">Nom :&nbsp;</label>
                        </div>
                        <div class="col-sm-6 input-column">
                          <input type="text" class="form-control" name="nom" value="<?php echo $dbrep['NomAdmin']; ?>">
                        </div>
                      </div>
                      <div class="form-row form-group">
                        <div class="col-sm-4 label-column">
                          <label class="col-form-label">Prénom :&nbsp;</label>
                        </div>
                        <div class="col-sm-6 input-column">
                          <input type="text" class="form-control" name="prenom" value="<?php echo $dbrep['PrenomAdmin']; ?>">
                        </div>
                      </div>
                      <div class="form-row form-group">
                        <div class="col-sm-4 label-column">
                          <label class="col-form-label">Téléphone :&nbsp;</label>
                        </div>
                        <div class="col-sm-6 input-column">
                          <input type="text" class="form-control" name="telephone" value="<?php echo $dbrep['TelephoneAdmin']; ?>">
                        </div>
                      </div>

                      <div>
                        <button type="submit" name="formmodifierprofil" class="btn btn-success btn-lg"><i class="fa fa-check" aria-hidden="true"></i>&nbsp;Modifier</button>
                        <button type="button" class="btn btn-danger btn-lg" id="btncancel" onclick="document.location.replace('profil.php')"><i class="fa fa-times" aria-hidden="true"></i>&nbsp;Annuler</button>
                        <button type="submit" name="formsupproduit" class="btn btn-outline-danger btn-lg float-right" style="margin-right: 15%;"><i class="fa fa-trash-o" aria-hidden="true"></i>&nbsp;Supprimer</button>

                      </div>
                    </form>

                  </div>
                </div>

              </div>
            </div>

          </div>

<!-- FIN FORMULAIRE -->

    <?php

}else {
  ?>
  <div class="container mt-3 text-center">
    <font color="red"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i>&nbsp;Vous n'avez pas les droits pour acceder à cette page&nbsp;<i class="fa fa-exclamation-triangle" aria-hidden="true"></i></font>
  </div>
  <?php
}

include 'assets/php/footer.php'; ?>



  </body>
</html>
