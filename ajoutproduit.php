<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Ajout d'un produit</title>
    <?php include 'assets/php/allcss.php';  ?>
  </head>
  <body>
    <?php
    include 'assets/php/nav.php';

    if (isset($_POST['formajoutproduit'])) {
      $nomproduit = htmlspecialchars($_POST['nomproduit']);
      $description = htmlspecialchars($_POST['description']);
      $prix = floatval(htmlspecialchars($_POST['prix']));
      $categorie = intval(htmlspecialchars($_POST['categorie']));

      if (!empty($_POST['nomproduit']) && !empty($_POST['prix']) && !empty($_POST['categorie'])) {

        $reqnom = $bdd->prepare("SELECT * FROM produit WHERE LibelleProduit = ?");
        $reqnom->execute(array($nomproduit));
        $nomexist = $reqnom->rowCount(); //compte les colonne deja existantes
        if ($nomexist == 0) {
          $insertmbr = $bdd->prepare("INSERT INTO produit(LibelleProduit, DescriptionProduit, PrixProduit, Categorie) VALUES(?, ?, ?, ?)");
          $insertmbr->execute(array($nomproduit, $description, $prix, $categorie));
          $erreur = "<br> Le produit a bien été ajouté <br><a href=\"/index.php\"><br>Revenir sur la page d'accueil</a>";
        } else {
          $erreur = "Le nom de ce produit existe déjà";
        }
      } else {
        $erreur = "Les champs précédés d'une * doivent être complétés";
      }
    }
    ?>

    <!-- FORMULAIRE -->
    <div class="container-fluid">
      <div class="bandeprincipale row">
        <div class="bg-white p-5 rounded my-4 my-lg-0" id="login-block">
          <div class="m-auto w-lg-75 w-xl-50">
            <h2 class="text-info font-weight-light mb-5"><i class="fa fa-diamond"></i>&nbsp;Nouveau produit</h2>
            <form method="POST">
              <!-- nom -->
              <div class="form-group">
                <label class="text-secondary">* Nom</label>
                <input class="form-control" type="text" name="nomproduit" value="<?php if(isset($nomproduit)) { echo $nomproduit; } ?>"/>
              </div>
              <!-- prix -->
              <div class="form-group">
                <label class="text-secondary">* Prix</label>
                <input class="form-control" type="text" name="prix" value="<?php if(isset($prix)) { echo $prix; } ?>"/>
              </div>
              <!-- categorie -->
              <div class="form-group">
                <label class="text-secondary">* Catégorie</label>
                  <select class="form-control" name="categorie" data-toggle="dropdown">
                    <?php
                    //charge les categorie
                    $reqcategorie = $bdd->prepare("SELECT * FROM categorie");
                    $reqcategorie->execute();
                    $categorieinfo = $reqcategorie->fetchAll();
                    foreach ($categorieinfo as $row) {
                      if ($row["IDCategorie"] == $categorie) {
                        echo '<option value="'.$row["IDCategorie"].'" selected="selected">'.$row["LibelleCategorie"].'</option>';
                      } else {
                        echo '<option value="'.$row["IDCategorie"].'">'.$row["LibelleCategorie"].'</option>';
                      }
                    }
                    ?>
                  </select>
              </div>
              <!-- description -->
              <div class="form-group">
                <label class="text-secondary">Description</label>
                <textarea class="form-control" name="description" rows="5" cols="80" ></textarea>
              </div>
              <!-- boutons -->
              <div>
                <button type="submit" name="formajoutproduit" class="btn btn-info mt-2">Ajouter</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <?php include 'assets/php/footer.php'; ?>
  </body>
</html>
