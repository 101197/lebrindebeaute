<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Modifier produit</title>
    <?php include 'assets/php/allcss.php'; ?>
  </head>
  <body>
    <?php
    include 'assets/php/nav.php';

    //verification droit d'acces
    if (isset($_SESSION['id'])) {
      //test si la propriétée id est presente
      if (isset($_GET['IDProduit'])) {
        //test si il y a un id set
        if (!empty($_GET['IDProduit'])) {

          $idproduit = $_GET['IDProduit'];

          //si le bouton valider est cliqué
          if (isset($_POST['formmodifierproduit'])) {
            //teste si les champs ne sont pas vides
            if (!empty($_POST['nomproduit']) && !empty($_POST['prix']) && !empty($_POST['categorie'])) {

              //variables
              $nomproduit = htmlspecialchars($_POST['nomproduit']);
              $description = htmlspecialchars($_POST['description']);
              $prix = floatval(htmlspecialchars($_POST['prix']));
              $categorie = intval(htmlspecialchars($_POST['categorie']));

              //le PDO
              $reqproduit = $bdd->prepare("UPDATE `produit` SET `LibelleProduit` = ?, `DescriptionProduit` = ?, `PrixProduit` = ?, `Categorie` = ? WHERE IDProduit = ?");
              $reqproduit->execute(array($idproduit));

            } else {
              echo "Tous les champs avec * doivent être complétés";
            }
          }

          if (isset($_POST['formsupproduit'])) {
            //variables
            $nomproduit = htmlspecialchars($_POST['nomproduit']);
            $description = htmlspecialchars($_POST['description']);
            $prix = floatval(htmlspecialchars($_POST['prix']));
            $categorie = intval(htmlspecialchars($_POST['categorie']));

            //le PDO
            $reqproduit = $bdd->prepare("DELETE FROM `produit` WHERE IDProduit = ?");
            $reqproduit->execute(array($nomproduit, $description, $prix, $categorie, $idproduit));
          }

          //charge les informations actuelles du produit
          $reqproduit = $bdd->prepare("SELECT * FROM produit WHERE IDProduit = ?");
          $reqproduit->execute(array($_GET['IDProduit']));
          $dbrep = $reqproduit->fetch();

          //le resultat remplit les variables
          $nomproduit = $dbrep['LibelleProduit'];
          $description = $dbrep['DescriptionProduit'];
          $prix = $dbrep['PrixProduit'];
          $categorie = $dbrep['Categorie'];
          ?>

<!-- FORMULAIRE -->

          <div class="container-fluid">
            <div class="bandeprincipale row">
              <div class="bg-white p-5 rounded my-4 my-lg-0" id="login-block">

                <div class="row register-form">
                  <div class="col-md-8 offset-md-2">

                    <form class="custom-form" method="post">
                      <h1>Modifier un produit</h1>
                      <div class="form-row form-group">
                        <div class="col-sm-4 label-column">
                          <label class="col-form-label">Nom :&nbsp;</label>
                        </div>
                        <div class="col-sm-6 input-column">
                          <input type="text" class="form-control" name="nomproduit" value="<?php echo $dbrep['LibelleProduit']; ?>">
                        </div>
                      </div>
                      <div class="form-row form-group">
                        <div class="col-sm-4 label-column">
                          <label class="col-form-label">Prix :&nbsp;</label>
                        </div>
                        <div class="col-sm-6 input-column">
                          <input type="text" class="form-control" name="prix" value="<?php echo $dbrep['PrixProduit']; ?>">
                        </div>
                        <div class="label-column">
                          <label class="col-form-label">€</label>
                        </div>
                      </div>
                      <div class="form-row form-group">
                        <div class="col-sm-4 label-column">
                          <label class="col-form-label">Catégorie :&nbsp;</label>
                        </div>
                        <div class="col-sm-6 input-column">
                          <div class="dropdown">
                            <select class="form-control dropdown-toggle" name="categorie" data-toggle="dropdown" id="categorieproduit">
                              <?php
                              //charge les categories
                              $reqcategorie = $bdd->prepare("SELECT * FROM categorie");
                              $reqcategorie->execute();
                              $categorieinfo = $reqcategorie->fetchAll();
                              foreach ($categorieinfo as $row) {
                                if ($row["IDCategorie"] == $categorie) {
                                  echo '<option value="'.$row["IDCategorie"].'" selected="selected">'.$row["LibelleCategorie"].'</option>';
                                }else {
                                  echo '<option value="'.$row["IDCategorie"].'">'.$row["LibelleCategorie"].'</option>';
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
                          <textarea name="description" rows="5" cols="80" class="form-control"><?php echo $dbrep["DescriptionProduit"]; ?></textarea>
                        </div>
                      </div>
                      <div>
                        <button type="submit" name="formmodifierproduit" class="btn btn-success btn-lg"><i class="fa fa-check" aria-hidden="true"></i>&nbsp;Modifier</button>
                        <button type="button" class="btn btn-danger btn-lg" id="btncancel" onclick="document.location.replace('administration.php')"><i class="fa fa-times" aria-hidden="true"></i>&nbsp;Annuler</button>
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
      <font color="red"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i>&nbsp;Erreur : aucun produit selectionné&nbsp;<i class="fa fa-exclamation-triangle" aria-hidden="true"></i></font>
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
