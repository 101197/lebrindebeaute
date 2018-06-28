<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Modifier client</title>
    <?php include 'assets/php/allcss.php'; ?>
  </head>
  <body>
    <?php
    include 'assets/php/nav.php';

    //verification droit d'acces
    if (isset($_SESSION['id'])) {
      //teste si la propriete id est presente
      if (isset($_GET['IDClient'])) {
        //teste s'il y a un id set
        if (!empty($_GET['IDClient'])) {

          $idclient = $_GET['IDClient'];

          //si le bouton valider est cliqué
          if (isset($_POST['formodifierclient'])) {
            //teste si les champs ne sont pas vides
            if (!empty($_POST['nomclient']) && !empty($_POST['prenomclient']) && !empty($_POST['mailclient']) && !empty($_POST['telephoneclient'])) {

              //variables
              $nomclient = htmlspecialchars($_POST['nomclient']);
              $prenomclient = htmlspecialchars($_POST['prenomclient']);
              $mailclient = htmlspecialchars($_POST['mailclient']);
              $telephoneclient = htmlspecialchars($_POST['telephoneclient']);

              //le PDO
              $reqclient = $bdd->prepare("UPDATE `client` SET `Nom` = ?, `Prenom` = ?, `Mail` = ?, `Telephone` = ? WHERE IDClient = ?");
              $reqclient->execute(array($nomclient, $prenomclient, $mailclient, $telephoneclient, $idclient));
            } else {
              echo "Tous les champs doivent être complétés";
            }
          }

          //si le bouton supprimer est cliqué
          if (isset($_POST['formsupclient'])) {
            //variables
            $nomclient = htmlspecialchars($_POST['nomclient']);
            $prenomclient = htmlspecialchars($_POST['prenomclient']);
            $mailclient = htmlspecialchars($_POST['mailclient']);
            $telephoneclient = intval(htmlspecialchars($_POST['telephoneclient']));

            //le PDO
            $reqclient = $bdd->prepare("DELETE FROM `client` WHERE IDClient = ?");
            $reqclient->execute(array($idclient));
          }

          //charge les information actuelles du client
          $reqclient = $bdd->prepare("SELECT * FROM client WHERE IDClient = ?");
          $reqclient->execute(array($_GET['IDClient']));
          $dbrep = $reqclient->fetch();

          //le resultat remplit les variables
          $nomclient = $dbrep['Nom'];
          $prenomclient = $dbrep['Prenom'];
          $mailclient = $dbrep['Mail'];
          $telephoneclient = $dbrep['Telephone'];
          ?>

          <!-- METTRE LE FORMULAIRE ICI -->

          <div class="container-fluid">
            <div class="bandeprincipale row">
              <div class="bg-white p-5 rounded my-4 my-lg-0" id="login-block">

                <div class="row register-form">
                  <div class="col-md-8 offset-md-2">

                    <form class="custom-form" method="post">
                      <h1>Modifier un client</h1>
                      <div class="form-row form-group">
                        <div class="col-sm-4 label-column">
                          <label class="col-form-label">Nom :&nbsp;</label>
                        </div>
                        <div class="col-sm-6 input-column">
                          <input type="text" class="form-control" name="nomclient" value="<?php echo $dbrep["Nom"]; ?>">
                        </div>
                      </div>
                      <div class="form-row form-group">
                        <div class="col-sm-4 label-column">
                          <label class="col-form-label">Prénom :&nbsp;</label>
                        </div>
                        <div class="col-sm-6 input-column">
                          <input type="text" class="form-control" name="prenomclient" value="<?php echo $dbrep["Prenom"]; ?>">
                        </div>
                      </div>
                      <div class="form-row form-group">
                        <div class="col-sm-4 label-column">
                          <label class="col-form-label">Mail :&nbsp;</label>
                        </div>
                        <div class="col-sm-6 input-column">
                          <input type="text" class="form-control" name="mailclient" value="<?php echo $dbrep["Mail"]; ?>">
                        </div>
                      </div>
                      <div class="form-row form-group">
                        <div class="col-sm-4 label-column">
                          <label class="col-form-label">Téléphone :&nbsp;</label>
                        </div>
                        <div class="col-sm-6 input-column">
                          <input type="text" class="form-control" name="telephoneclient" value="<?php echo $dbrep["Telephone"]; ?>">
                        </div>
                      </div>
                      <div style="margin-top: 5%;">
                        <button type="submit" name="formodifierclient" class="btn btn-success btn-lg"><i class="fa fa-check" aria-hidden="true"></i>&nbsp;Modifier</button>
                        <button type="button" class="btn btn-danger btn-lg" id="btncancel" onclick="document.location.replace('administration.php')"><i class="fa fa-times" aria-hidden="true"></i>&nbsp;Annuler</button>
                        <button type="submit" name="formsupclient" class="btn btn-outline-danger btn-lg float-right" style="margin-right: 15%;"><i class="fa fa-trash-o" aria-hidden="true"></i>&nbsp;Supprimer</button>

                      </div>
                    </form>

                  </div>
                </div>

              </div>
            </div>
          </div>

          <!-- FIN DU FORMULAIRE -->

          <?php
        } else {
          ?>
          <div class="container mt-3 text-center">
            <font color="red"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i>&nbsp;Erreur : aucun utilisateur selectionné&nbsp;<i class="fa fa-exclamation-triangle" aria-hidden="true"></i></font>
            <button type="button" class="btn btn-danger btn-lg" onclick="document.location.replace('administration.php')"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i>&nbsp;Retour</button>
          </div>
          <?php
        }
      } else {
        ?>
        <div class="container mt-3 text-center">
          <font color="red"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i>&nbsp;Erreur : propriété id introuvable&nbsp;<i class="fa fa-exclamation-triangle" aria-hidden="true"></i></font>
          <button type="button" class="btn btn-danger btn-lg" onclick="doncument.location.replace('administration.php')"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i>&nbsp;Retour</button>
        </div>
        <?php
      }
    } else {
      ?>
      <div class="container mt-3 text-center">
        <font color="red"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i>&nbsp;Vous n'avez pas les droits pour acceder à cette page&nbsp;<i class="fa fa-exclamation-triangle" aria-hidden="true"></i></font>
      </div>
      <?php
    }

    include 'assets/php/footer.php'; ?>

  </body>
</html>
