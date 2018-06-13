<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Modifier un produit</title>
    <link rel="stylesheet" href="allcss.php">
  </head>
  <body>
    <?php
    //verification droit d'acces
    if (isset($_SESSION['id']) ) {
      //test si la propriétée id est presente
      if (isset($_GET['id'])) {
        //test si il y a un id set
        if (!empty($_GET['id'])) {
          //si le bouton valider est cliqué
          if (isset($_POST['formmodifierproduit'])) {

            //variables
            $idproduit = $_POST['idproduit'];
            $nomproduit = htmlspecialchars($_POST['nomproduit']);
            $prix = floatval(htmlspecialchars($_POST['prix']));
            $categorie = intval(htmlspecialchars($_POST['categorie']));
            $description = htmlspecialchars($_POST['description']);

            //test si les champs ne sont pas vides
            if (!empty($_POST['nomproduit']) && !empty($_POST['prix']) && !empty($_POST['description']) && !empty($_POST['categorie'])) {
              //test si les types sont corrects
              if (is_numeric($_POST['prix']) && is_numeric($_POST['categorie'])) {

                //update le produit
                $updateproduit = $bdd->prepare("UPDATE produit SET LibelleProduit = ?, DescriptionProduit = ?, PrixProduit = ?, Categorie = ?");
                $updateproduit->execute(array($nomproduit, $prix, $categorie, $description));

              }else {
                $erreur = "Un ou plusieurs types sont incorrects.";
              }
            }else {
              $erreur = "Tous les champs doivent être complétés.";
            }
          }

          //charge les informations actuelles du produit
          $reqproduit = $bdd->prepare("SELECT * FROM produit WHERE IDProduit = ?");
          $reqproduit->execute(array($_GET['id']));
          $dbrep = $reqproduit->fetch();

          //le resultat remplit les variables
          $nomproduit = $dbrep["LibelleProduit"];
          $prix = $dbrep["PrixProduit"];
          $categorie = $dbrep["Categorie"];
          $description = $dbrep["DescriptionProduit"];
    ?>

    <div class="container">
      <h1>Modifier un produit</h1>
      <form class="" method="post">
        <div class="row bg-light rounded">
          <div class="col">
            <div class="row">
              <div class="col-sm-5">
                <div class="form-inline m-2">
                  <label class="mr-1">Nom :</label>
                  <input type="text" name="nomproduit" value="<?php echo $nomproduit ?>" class="form-control" id="nomproduit">
                </div>
              </div>
              <div class="col-sm-5">
                <div class="form-inline m-2">
                  <label class="mr-1">Prix :</label>
                  <input type="text" name="prix" value="<?php echo $prix ?>" class="form-control" id="prixproduit">
                </div>
              </div>
              <div class="col-sm-5">
                <div class="form-inline m-2">
                  <label class="mr-1">Categorie :</label>
                  <select class="form-control" name="categorie" id="categorieproduit">
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
              <div class="col-sm-5">
                <div class="form-inline m-2">
                  <label class="mr-1">Description :</label>
                  <textarea name="description" rows="5" class="form-control" id="descriptionproduit"><?php echo $description ?></textarea>
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
              <input type="text" name="idproduit" value="<?php if(isset($_GET['id'])) {
                echo $_GET['id'];} ?>">
              <button type="button" class="btn btn-success float-right btn-lg" data-toggle="modal" data-target="#produitconfirme">Valider</button>
            </div>

            <!-- Modal de confirmation -->
            <div class="modal fade" id="produitconfirme">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Modifier le produit</h4>
                    <button type="button" class="close" data-dismiss="modal">&time;</button>
                  </div>
                  <div class="modal-body" id="modalbody"></div> <!-- heu wtf cette ligne? -->
                  <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal">Annuler</button>
                    <button type="submit" name="formmodifierproduit" class="btn btn-success btn-lg float-right" id="btndone">Valider</button>
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
      <font color="red">Erreur: aucun produit selectionné</font>
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
