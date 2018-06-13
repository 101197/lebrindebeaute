<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Modifier un service</title>
    <link rel="stylesheet" href="allcss.php">
  </head>
  <body>
    <?php
    //verification droit d'acces
    if (isset($_SESSION['id'])) {
      //test si la propriétée id est presente
      if (isset($_GET['id'])) {
        //test si il y a un id set
        if (!empty($_GET['id'])) {
          //si le bouton valider est cliqué
          if (isset($_POST['formmodifierproduit'])) {

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
          $reqservice->execute(array($_GET['id']));
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
                  <label class="mr-1">Nom :</label>
                  <input type="text" name="nomservice" value="<?php echo $nomservice ?>" class="form-control" id="nomservice">
                </div>
              </div>
              <div class="col-sm-5">
                <div class="form-inline m-2">
                  <label class="mr-1">Prix :</label>
                  <input type="text" name="prix" value="<?php echo $prix ?>" class="form-control" id="prixservice">
                </div>
              </div>
              <div class="col-sm-5">
                <div class="form-inline m-2">
                  <label class="mr-1">Type :</label>
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
                  <label class="mr-1">Description :</label>
                  <textarea name="description" rows="5" class="form-control" id="descriptionservice"><?php echo $description ?></textarea>
                </div>
              </div>
            </div>
          </div>
            <div class="container mt-3 text-center">
              <button type="button" class="btn btn-danger float-left btn-lg" id="btncancel">Annuler</button>
              <?php
              if(isset($erreur)) {
                echo '<font color="red">'.$erreur."</font>";
              } ?>
              <input type="text" name="idservice" value="<?php if(isset($_GET['id'])) {
                echo $_GET['id'];} ?>">
              <button type="button" class="btn btn-success float-right btn-lg" data-toggle="modal" data-target="#serviceconfirme">Valider</button>
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
                    <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal">Annuler</button>
                    <button type="submit" name="formmodifierservice" class="btn btn-success btn-lg float-right" id="btndone">Valider</button>
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
      <font color="red">Erreur: aucun service selectionné</font>
      <button type="button" class="btn btn-danger btn-lg" onclick="document.location.replace('administration.php')">Retour</button>
    </div>
    <?php
  }
}else {
  ?>
  <div class="container mt-3 text-center">
    <font color="red">Erreur : propriété id introuvable</font>
    <button type="button" class="btn btn-danger btn-lg" onclick="document.location.replace('administration.php')">Retour</button>
  </div>
  <?php
};
}else {
  ?>
  <div class="container mt-3 text-center">
    <font color="red">Vous n'avez pas les droits pour acceder à cette page</font>
  </div>
  <?php
}
?>
  </body>
</html>
