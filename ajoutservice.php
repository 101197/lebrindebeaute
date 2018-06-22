<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Ajout d'un service</title>
    <?php include 'assets/php/allcss.php';  ?>
  </head>
  <body>
    <?php
    include 'assets/php/nav.php';

    if (isset($_POST['formajoutservice'])) {
      $nomservice = htmlspecialchars($_POST['nomservice']);
      $description = htmlspecialchars($_POST['description']);
      $prix = floatval(htmlspecialchars($_POST['prix']));
      $type = intval(htmlspecialchars($_POST['type']));
      $temps = htmlspecialchars($_POST['temps']);
      $soustype = intval(htmlspecialchars($_POST['soustype']));

      if (!empty($_POST['nomservice']) && !empty($_POST['prix']) && !empty($_POST['type']) && !empty($_POST['soustype'])) {

        $reqnom = $bdd->prepare("SELECT * FROM service WHERE LibelleService = ?");
        $reqnom->execute(array($nomservice));
        $nomexist = $reqnom->rowCount(); //compte les colonne deja existantes
        if ($nomexist == 0) {
          $insertmbr = $bdd->prepare("INSERT INTO service(LibelleService, DescriptionService, PrixService, Type, TempsService, SousType) VALUES(?, ?, ?, ?, ?, ?)");
          $insertmbr->execute(array($nomservice, $description, $prix, $type, $temps, $soustype));
          $erreur = "<br> Le service a bien été ajouté <br><a href=\"/index.php\"><br>Revenir sur la page d'accueil</a>";
        } else {
          $erreur = "Le nom de ce service existe déjà";
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
            <h2 class="text-info font-weight-light mb-5"><i class="fa fa-diamond"></i>&nbsp;Nouveau service</h2>
            <form method="POST">
              <!-- nom -->
              <div class="form-group">
                <label class="text-secondary">* Nom</label>
                <input class="form-control" type="text" name="nomservice" value="<?php if(isset($nomservice)) { echo $nomservice; } ?>"/>
              </div>
              <!-- prix -->
              <div class="form-group">
                <label class="text-secondary">* Prix</label>
                <input class="form-control" type="text" name="prix" value="<?php if(isset($prix)) { echo $prix; } ?>"/>
              </div>
              <!-- temps -->
              <div class="form-group">
                <label class="text-secondary">Temps</label>
                <input class="form-control" type="text" name="temps" value="<?php if(isset($temps)) { echo $temps; } ?>"/>
              </div>
              <!-- type -->
              <div class="form-group">
                <label class="text-secondary">* Type</label>
                  <select class="form-control" name="type" data-toggle="dropdown">
                    <?php
                    //charge les types
                    $reqtype = $bdd->prepare("SELECT * FROM type");
                    $reqtype->execute();
                    $typeinfo = $reqtype->fetchAll();
                    foreach ($typeinfo as $row) {
                      if ($row["IDType"] == $type) {
                        echo '<option value="'.$row["IDType"].'" selected="selected">'.$row["LibelleType"].'</option>';
                      } else {
                        echo '<option value="'.$row["IDType"].'">'.$row["LibelleType"].'</option>';
                      }
                    }
                    ?>
                  </select>
              </div>
              <!-- soustype -->
              <div class="form-group">
                <label class="text-secondary">* Sous-type</label>
                  <select class="form-control" name="soustype" data-toggle="dropdown">
                    <?php
                    //charge les types
                    $reqsoustype = $bdd->prepare("SELECT * FROM soustype");
                    $reqsoustype->execute();
                    $soustypeinfo = $reqsoustype->fetchAll();
                    foreach ($soustypeinfo as $row) {
                      if ($row["IDSousType"] == $soustype) {
                        echo '<option value="'.$row["IDSousType"].'" selected="selected">'.$row["LibelleSousType"].'</option>';
                      } else {
                        echo '<option value="'.$row["IDSousType"].'">'.$row["LibelleSousType"].'</option>';
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
                <button type="submit" name="formajoutservice" class="btn btn-info mt-2">Ajouter</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <?php include 'assets/php/footer.php'; ?>
  </body>
</html>
