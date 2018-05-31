<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
      <meta charset="utf-8">
      <title>Inscription</title>
      <?php include 'assets/php/allcss.php';  ?>
  </head>

    <body>
      <?php
        include 'assets/php/nav.php';

        if(isset($_POST['forminscription'])) {
          $pseudo = htmlspecialchars($_POST['pseudo']);
          $nom = htmlspecialchars($_POST['nom']);
          $prenom = htmlspecialchars($_POST['prenom']);
          $mail = htmlspecialchars($_POST['mail']);
          $mail2 = htmlspecialchars($_POST['mail2']);
          $mdp = sha1($_POST['mdp']);
          $mdp2 = sha1($_POST['mdp2']);
          $telephone = htmlspecialchars($_POST['telephone']);

          if(!empty($_POST['pseudo']) AND !empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['mail']) AND !empty($_POST['mail2']) AND !empty($_POST['mdp']) AND !empty($_POST['mdp2'])) {
            $pseudolength = strlen($pseudo);
            if($pseudolength <= 20) {
              $reqpseudo = $bdd->prepare("SELECT * FROM client WHERE Pseudo = ?");
              $reqpseudo->execute(array($pseudo));
              $pseudoexist = $reqpseudo->rowCount();
              if($pseudoexist == 0) {
                if($mail == $mail2) {
                  if(filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                    $reqmail = $bdd->prepare("SELECT * FROM client WHERE Mail = ?");
                    $reqmail->execute(array($mail));
                    $mailexist = $reqmail->rowCount();
                    if($mailexist == 0) {
                      if($mdp == $mdp2) {
                        $insertmbr = $bdd->prepare("INSERT INTO client(Pseudo, Mail, Mdp, Nom, Prenom, Telephone) VALUES(?, ?, ?, ?, ?, ?)");
                        $insertmbr->execute(array($pseudo, $mail, $mdp, $nom, $prenom, $telephone));
                        $erreur = "<br> Votre compte a bien été créé !<br><a href=\"/accueil.php\"><br />Revenir sur la page d'accueil<br /></a><a href=\"/connexion.php\"><br />Se connecter!</a>";
                      } else {
                        $erreur = "Vos mots de passe ne correspondent pas!";
                      }
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
                $erreur = "Le pseudo \"".$pseudo."\" est déjà utilisé!";
              }
            } else {
              $erreur = "Votre pseudo ne doit pas dépasser 20 caractères!";
            }
          } else {
            $erreur = "Tous les champs doivent être complétés!";
          }
        }
      ?>

      <div class="container-fluid">
        <div class="bandeprincipale row mh-100vh">
          <div class="col-10 col-sm-8 col-md-6 col-lg-6 offset-1 offset-sm-2 offset-md-3 offset-lg-0 align-self-center d-lg-flex align-items-lg-center align-self-lg-stretch bg-white p-5 rounded rounded-lg-0 my-5 my-lg-0" id="login-block">
            <div class="m-auto w-lg-75 w-xl-50">
              <h2 class="text-info font-weight-light mb-5"><i class="fa fa-diamond"></i>&nbsp;S'inscrire</h2>
              <form method="POST">
                <!-- pseudo -->
                <div class="form-group">
                  <label class="text-secondary">Pseudo</label>
                  <input class="form-control" type="text" id="pseudo" name="pseudo" value="<?php if(isset($pseudo)) { echo $pseudo; } ?>"/>
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
                <!-- mdp -->
                <div class="form-group">
                  <label class="text-secondary">Mot de passe</label>
                  <input class="form-control" type="password" id="mdp" name="mdp">
                </div>
                <!-- mdp2 -->
                <div class="form-group">
                  <label class="text-secondary">Confirmation du mot de passe</label>
                  <input class="form-control" type="password" id="mdp2" name="mdp2">
                </div>
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

              <div class="mdpoublie">
                <p class="mt-3 mb-0"><a href="#" class="text-info small">Mot de passe oublié?</a></p>
              </div>

            </div>
          </div>
        </div>
      </div>

      <?php include 'assets/php/footer.php'; ?>
      <script src="assets/js/jquery.min.js"></script>
      <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    </body>
  </html>
