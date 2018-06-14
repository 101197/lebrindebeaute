<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Modifier un service</title>
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
          //si le bouton valider est cliqué
          if (isset($_POST['formmodifierservice'])) {

            //variables
            $idservice = $_POST['idservice'];
            $nomservice = htmlspecialchars($_POST['nomservice']);
            $description = htmlspecialchars($_POST['description']);
            $prix = floatval(htmlspecialchars($_POST['prix']));
            $type = intval(htmlspecialchars($_POST['type']));
            $soustype = intval(htmlspecialchars($_POST['soustype']));
            $temps = htmlspecialchars($_POST['temps']);

            //test si les champs ne sont pas vides
            if (!empty($_POST['nomservice']) && !empty($_POST['prix']) && !empty($_POST['type'])) {

                //update le produit
                $updateproduit = $bdd->prepare("UPDATE service SET LibelleService = ?, DescriptionService = ?, PrixService = ?, Type = ?, TempsService = ?, SousType = ?");
                $updateproduit->execute(array($nomservice, $description, $prix, $type, $temps, $soustype));

            }else {
              $erreur = "Tous les champs avec * doivent être complétés.";
            }
          }

          //charge les informations actuelles du produit
          $reqservice = $bdd->prepare("SELECT * FROM service WHERE IDService = ?");
          $reqservice->execute(array($_GET['IDService']));
          $dbrep = $reqservice->fetch();

          //le resultat remplit les variables
          $nomservice = $dbrep["LibelleService"];
          $description = $dbrep["DescriptionService"];
          $prix = $dbrep["PrixService"];
          $type = $dbrep["Type"];
          $temps = $dbrep["TempsService"];
          $soustype = $dbrep["SousType"];
    ?>

    <div class="container">
      <h1>Modifier un service</h1>
      <form class="" method="post">
        <div class="row bg-light rounded">
          <div class="col">
            <div class="row">
              <div class="col-sm-5">
                <div class="form-inline m-2">
                  <label class="mr-1">Nom :&nbsp;</label>
                  <input type="text" name="nomservice" value="<?php echo $nomservice ?>" class="form-control" id="nomservice">
                </div>
              </div>
              <div class="col-sm-5">
                <div class="form-inline m-2">
                  <label class="mr-1">Prix :&nbsp;
                  <input type="text" name="prix" value="<?php echo $prix ?>" class="form-control" id="prixservice">
                  €</label>
                </div>
              </div>
              <div class="col-sm-5">
                <div class="form-inline m-2">
                  <label class="mr-1">Type :&nbsp;</label>
                  <select class="form-control" name="type" id="typeservice">
                    <?php
                    //charge les categories
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
              <div class="col-sm-5">
                <div class="form-inline m-2">
                  <label class="mr-1">Description :&nbsp;</label>
                  <textarea name="description" rows="5" class="form-control" id="descriptionservice"><?php echo $description ?></textarea>
                </div>
              </div>
            </div>
          </div>
            <div class="container mt-3 text-center">
              <button type="button" class="btn btn-danger float-left btn-lg" id="btncancel" onclick="document.location.replace('administration.php')"><i class="fa fa-times" aria-hidden="true"></i>&nbsp;Annuler</button>
              <?php
              if(isset($erreur)) {
                echo '<font color="red">'.$erreur."</font>";
              } ?>
              <!-- <input type="text" name="idservice" value="<?php if(isset($_GET['id'])) {
                echo $_GET['id'];} ?>"> -->
              <button type="button" class="btn btn-success float-right btn-lg" data-toggle="modal" data-target="#serviceconfirme"><i class="fa fa-check" aria-hidden="true"></i>
&nbsp;Valider</button>
            </div>

            <!-- Modal de confirmation -->
            <div class="modal fade" id="serviceconfirme">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Modifier le service</h4>
                    <button type="button" class="close" data-dismiss="modal">&time;</button>
                  </div>
                  <div class="modal-body" id="modalbody"></div> <!-- heu wtf cette ligne? -->
                  <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i>&nbsp;Annuler</button>
                    <button type="submit" name="formmodifierservice" class="btn btn-success btn-lg float-right" id="btndone"><i class="fa fa-check" aria-hidden="true"></i>
&nbsp;Valider</button>
                  </div>
                </div>
              </div>
            </div>
      </form>
    </div>
    <?php
  }else {
    ?>
    <div class="container mt-3 text-center">
      <font color="red"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i>Erreur: aucun service selectionné<i class="fa fa-exclamation-triangle" aria-hidden="true"></i></font><br>
      <button type="button" class="btn btn-primary form-btn" onclick="document.location.replace('administration.php')"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i>&nbsp;Retour</button>
    </div>
    <?php
  }
}else {
  ?>
  <div class="container mt-3 text-center">
    <font color="red"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i>Erreur : propriété id introuvable<i class="fa fa-exclamation-triangle" aria-hidden="true"></i></font><br>
    <button type="button" class="btn btn-primary form-btn" onclick="document.location.replace('administration.php')"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i>&nbsp;Retour</button>
  </div>
  <?php
};
}else {
  ?>
  <div class="container mt-3 text-center">
    <font color="red"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i>Vous n'avez pas les droits pour acceder à cette page<i class="fa fa-exclamation-triangle" aria-hidden="true"></i></font>
  </div>
  <?php
}
?>
  </body>
</html>
