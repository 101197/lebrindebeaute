<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
      <meta charset="utf-8">
      <title>Connexion</title>
      <?php include 'assets/php/allcss.php';  ?>
  </head>

    <body>
      <?php
        include 'assets/php/nav.php';

        if(isset($_POST['formconnexion'])) {
          $pseudoconnect = htmlspecialchars($_POST['pseudoconnect']);
          $mdpconnect = sha1($_POST['mdpconnect']);
          if(!empty($pseudoconnect) AND !empty($mdpconnect)) {
            $requser = $bdd->prepare("SELECT admin.IDAdmin, admin.PseudoAdmin FROM admin WHERE PseudoAdmin = ? AND MdpAdmin = ?");
            $requser->execute(array($pseudoconnect, $mdpconnect));
            $userexist = $requser->rowCount();
            if($userexist == 1) {
              $userinfo = $requser->fetch();
              $_SESSION['id'] = $userinfo['IDAdmin'];
              $_SESSION['pseudo'] = $userinfo['PseudoAdmin'];
              ?>
              <meta http-equiv="refresh" content="0;./accueil" />
              <?php
            } else {
              $erreur = "<br>Mauvais pseudo ou mauvais mot de passe !";
            }
          } else {
            $erreur = "<br>Tous les champs doivent être complétés !";
          }
        }
      ?>



      <div class="container-fluid">
        <div class="bandeprincipale row mh-100vh">
          <div class="bg-white p-5 rounded my-4 my-lg-0" id="login-block">
            <div class="m-auto w-lg-75 w-xl-50">
              <h2 class="text-info font-weight-light mb-5"><i class="fa fa-diamond"></i>&nbsp;Se connecter</h2>
              <form method="POST">
                <div class="form-group">
                  <label class="text-secondary">Pseudo</label>
                  <input class="form-control" type="text" name="pseudoconnect">
                </div>
                <div class="form-group">
                  <label class="text-secondary">Mot de passe</label>
                  <input class="form-control" type="password" name="mdpconnect">
                </div>
                <input class="btn btn-info mt-2" type="submit" name="formconnexion" value="Connexion"/>

              </form>

              <?php
                if(isset($erreur)) {
                  echo '<font color="red">'.$erreur."</font>";
                }
              ?>

              <!--<div class="mdpoublie">
                <p class="mt-3 mb-0"><a href="#" class="text-info small">Mot de passe oublié?</a></p>
              </div>-->

            </div>
          </div>
        </div>
      </div>

      <?php include 'assets/php/footer.php'; ?>
      <script src="assets/js/jquery.min.js"></script>
      <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    </body>
  </html>
