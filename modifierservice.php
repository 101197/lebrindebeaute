<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Modifier service</title>
    <?php include 'assets/php/allcss.php'; ?>
  </head>
  <body>
    <?php
    include 'assets/php/nav.php';

    //verification droit d'acces
    if (isset($_SESSION['id'])) {
      //test si la propriétée id est presente
      if (isset($_GET['IDService'])) {
        //test si il y a un id set
        if (!empty($_GET['IDService'])) {

          $idservice = $_GET['IDService'];

          //si le bouton valider est cliqué
          if (isset($_POST['formmodifierservice'])) {
            //teste si les champs ne sont pas vides
            if (!empty($_POST['nomservice']) && !empty($_POST['prix']) && !empty($_POST['type'])) {

              //variables
              $nomservice = htmlspecialchars($_POST['nomservice']);
              $description = htmlspecialchars($_POST['description']);
              $prix = floatval(htmlspecialchars($_POST['prix']));
              $type = intval(htmlspecialchars($_POST['type']));
              $soustype = intval(htmlspecialchars($_POST['soustype']));
              $temps = htmlspecialchars($_POST['temps']);

              //le PDO
              $reqservice = $bdd->prepare("UPDATE `service` SET `LibelleService` = ?, `DescriptionService` = ?, `PrixService` = ?, `Type` = ?, `SousType` = ?, `TempsService` = ? WHERE IDService = ?");
              $reqservice->execute(array($nomservice, $description, $prix, $type, $soustype, $temps, $idservice));

            } else {
              echo "Tous les champs avec * doivent être complétés";
            }
          }

          //charge les informations actuelles du produit
          $reqservice = $bdd->prepare("SELECT * FROM service WHERE IDService = ?");
          $reqservice->execute(array($_GET['IDService']));
          $dbrep = $reqservice->fetch();

          //le resultat remplit les variables
          $nomservice = $dbrep['LibelleService'];
          $description = $dbrep['DescriptionService'];
          $prix = $dbrep['PrixService'];
          $type = $dbrep['Type'];
          $temps = $dbrep['TempsService'];
          $soustype = $dbrep['SousType'];
          ?>

<!-- FORMULAIRE -->

          <div class="container-fluid">
            <div class="bandeprincipale row">
              <div class="bg-white p-5 rounded my-4 my-lg-0" id="login-block">

                <div class="row register-form">
                  <div class="col-md-8 offset-md-2">

                    <form class="custom-form" method="post">
                      <h1>Modifier un service</h1>
                      <div class="form-row form-group">
                        <div class="col-sm-4 label-column">
                          <label class="col-form-label">* Nom :&nbsp;</label>
                        </div>
                        <div class="col-sm-6 input-column">
                          <input type="text" class="form-control" name="nomservice" value="<?php echo $dbrep['LibelleService']; ?>">
                        </div>
                      </div>
                      <div class="form-row form-group">
                        <div class="col-sm-4 label-column">
                          <label class="col-form-label">* Prix :&nbsp;</label>
                        </div>
                        <div class="col-sm-6 input-column">
                          <input type="text" class="form-control" name="prix" value="<?php echo $dbrep['PrixService']; ?>">
                        </div>
                        <div class="label-column">
                          <label class="col-form-label">€</label>
                        </div>
                      </div>
                      <div class="form-row form-group">
                        <div class="col-sm-4 label-column">
                          <label class="col-form-label">Temps :&nbsp;</label>
                        </div>
                        <div class="col-sm-6 input-column">
                          <input type="text" class="form-control" name="temps" value="<?php echo $dbrep['TempsService']; ?>">
                        </div>
                      </div>
                      <div class="form-row form-group">
                        <div class="col-sm-4 label-column">
                          <label class="col-form-label">* Type :&nbsp;</label>
                        </div>
                        <div class="col-sm-6 input-column">
                          <div class="dropdown">
                            <select class="form-control dropdown-toggle" name="type" data-toggle="dropdown" id="typeservice">
                              <?php
                              //charge les types
                              $reqtype = $bdd->prepare("SELECT * FROM type");
                              $reqtype->execute();
                              $typeinfo = $reqtype->fetchAll();
                              foreach ($typeinfo as $row) {
                                if ($row["IDType"] == $type) {
                                  echo '<option value="'.$row["IDType"].'" selected="selected">'.$row["LibelleType"].'</option>';
                                }else {
                                  echo '<option value="'.$row["IDType"].'">'.$row["LibelleType"].'</option>';
                                }
                              }
                              ?>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="form-row form-group">
                        <div class="col-sm-4 label-column">
                          <label class="col-form-label">Sous-type :&nbsp;</label>
                        </div>
                        <div class="col-sm-6 input-column">
                          <div class="dropdown">
                            <select class="form-control dropdown-toggle" name="soustype" data-toggle="dropdown" id="soustypeservice">
                              <?php
                              //charge les categories
                              $reqsoustype = $bdd->prepare("SELECT * FROM soustype");
                              $reqsoustype->execute();
                              $soustypeinfo = $reqsoustype->fetchAll();
                              foreach ($soustypeinfo as $row) {
                                if ($row["IDSousType"] == $soustype) {
                                  echo '<option value="'.$row["IDSousType"].'" selected="selected">'.$row["LibelleSousType"].'</option>';
                                }else {
                                  echo '<option value="'.$row["IDSousType"].'">'.$row["LibelleSousType"].'</option>';
                                }
                              }
                              ?>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="form-row form-group">
                        <div class="col-sm-4 label-column">
                          <label class="col-form-label">Description :&nbsp;</label>
                        </div>
                        <div class="col-sm-6 input-column">
                          <textarea name="description" rows="5" cols="80" class="form-control"><?php echo $dbrep["DescriptionService"]; ?></textarea>
                        </div>
                      </div>
                      <div>
                        <button type="submit" name="formmodifierservice" class="btn btn-success btn-lg"><i class="fa fa-check" aria-hidden="true"></i>&nbsp;Modifier</button>
                        <button type="button" class="btn btn-danger btn-lg" id="btncancel" onclick="document.location.replace('administration.php')"><i class="fa fa-times" aria-hidden="true"></i>&nbsp;Annuler</button>
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
      <font color="red"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i>&nbsp;Erreur : aucun service selectionné&nbsp;<i class="fa fa-exclamation-triangle" aria-hidden="true"></i></font>
      <button type="button" class="btn btn-danger btn-lg" onclick="document.location.replace('administration.php')"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i>&nbsp;Retour</button>
    </div>
    <?php
  }
}else {
  ?>
  <div class="container mt-3 text-center">
    <font color="red"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i>&nbsp;Erreur : propriété id introuvable&nbsp;<i class="fa fa-exclamation-triangle" aria-hidden="true"></i></font>
    <button type="button" class="btn btn-danger btn-lg" onclick="doncument.location.replace('administration.php')"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i>&nbsp;Retour</button>
  </div>
  <?php
};
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
