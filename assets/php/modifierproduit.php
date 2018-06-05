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
    if (isset($_SESSION['id']) && $_SESSION['pseudo'] == 'Admin') {
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

    <!-- LIGNE 123 DU CODE PPE2 -->
        }
      }
    } ?>
  </body>
</html>
