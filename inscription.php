<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
      <meta charset="utf-8">
      <title>Inscription Newsletter</title>
      <?php include 'assets/php/allcss.php';  ?>
  </head>

    <body>
      <?php
        include 'assets/php/nav.php';

        if(isset($_POST['forminscription'])) {
          $nom = htmlspecialchars($_POST['nom']);
          $prenom = htmlspecialchars($_POST['prenom']);
          $mail = htmlspecialchars($_POST['mail']);
          $mail2 = htmlspecialchars($_POST['mail2']);
          $telephone = htmlspecialchars($_POST['telephone']);

          if(!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['mail']) && !empty($_POST['mail2']) &&!empty($_POST['telephone'])) {
                if($mail == $mail2) {
                  if(filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                    $reqmail = $bdd->prepare("SELECT * FROM client WHERE Mail = ?");
                    $reqmail->execute(array($mail));
                    $mailexist = $reqmail->rowCount();
                    if($mailexist == 0) {
                        $insertmbr = $bdd->prepare("INSERT INTO client(Mail, Nom, Prenom, Telephone) VALUES(?, ?, ?, ?)");
                        $insertmbr->execute(array($mail, $nom, $prenom, $telephone));
                        $erreur = "<br> Votre compte a bien été créé !<br><a href=\"/accueil.php\"><br />Revenir sur la page d'accueil<br /></a>";
                    } else {
                      $erreur = "L'adresse mail est déjà utilisée!";
                    }
                  } else {
                    $erreur = "Votre adresse mail n'est pas valide!";
                  }
                } else {
                  $erreur = "Vos adresses mail ne correspondent pas!";
                }
          } else {
            $erreur = "Tous les champs doivent être complétés!";
          }
        }
      ?>

      <div class="container-fluid">
        <div class="bandeprincipale row mh-100vh">
          <div class="bg-white p-5 rounded my-4 my-lg-0" id="login-block">
            <div class="m-auto w-lg-75 w-xl-50">
              <h2 class="text-info font-weight-light mb-5"><i class="fa fa-diamond"></i>&nbsp;S'inscrire à la newsletter</h2>
              <form method="POST">

                <!-- Nom -->
                <div class="form-group">
                  <label class="text-secondary">Nom</label>
                  <input type="nom" class="form-control" id="nom" name="nom" value="<?php if(isset($nom)) { echo $nom; } ?>" />
                </div>
                <!-- Prénom -->
                <div class="form-group">
                  <label class="text-secondary">Prénom</label>
                  <input type="prenom" class="form-control" id="prenom" name="prenom" value="<?php if(isset($prenom)) { echo $prenom; } ?>" />
                </div>
                <!-- mail -->
                <div class="form-group">
                  <label class="text-secondary">E-mail</label>
                  <input class="form-control" type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,15}$" inputmode="email" id="mail" name="mail" value="<?php if(isset($mail)) { echo $mail; } ?>" />
                </div>
                <!-- mail2 -->
                <div class="form-group">
                  <label class="text-secondary">Confirmation d'e-mail</label>
                  <input class="form-control" type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,15}$" inputmode="email" id="mail2" name="mail2" value="<?php if(isset($mail2)) { echo $mail2; } ?>" />
                </div>
                <!-- Téléphone -->
                <div class="form-group">
                  <label class="text-secondary">Téléphone</label>
                  <input type="telephone" class="form-control" id="telephone" name="telephone" value="<?php if(isset($telephone)) { echo $telephone; } ?>" />
                </div>
                <button class="btn btn-info mt-2" type="submit" name="forminscription">Inscription</button>
              </form>

              <?php
                if(isset($erreur)) {
                  echo '<font color="red">'.$erreur."</font>";
                }
              ?>


            </div>
          </div>
        </div>
      </div>

      <?php include 'assets/php/footer.php'; ?>
      <script src="assets/js/jquery.min.js"></script>
      <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    </body>
  </html>
