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
          $mailconnect = htmlspecialchars($_POST['mailconnect']);
          $mdpconnect = sha1($_POST['mdpconnect']);
          if(!empty($mailconnect) AND !empty($mdpconnect)) {
            $requser = $bdd->prepare("SELECT client.IDClient, client.Mail FROM client WHERE Mail = ? AND Mdp = ?");
            $requser->execute(array($mailconnect, $mdpconnect));
            $userexist = $requser->rowCount();
            if($userexist == 1) {
              $userinfo = $requser->fetch();
              $_SESSION['id'] = $userinfo['IDClient'];
              $_SESSION['mail'] = $userinfo['Mail'];
            } else {
              $erreur = "<br>Mauvais mail ou mauvais mot de passe !";
            }
          } else {
            $erreur = "<br>Tous les champs doivent être complétés !";
          }
        }
      ?>



      <div class="container-fluid">
        <div class="bandeprincipale row mh-100vh">
          <div class="col-10 col-sm-8 col-md-6 col-lg-6 offset-1 offset-sm-2 offset-md-3 offset-lg-0 align-self-center d-lg-flex align-items-lg-center align-self-lg-stretch bg-white p-5 rounded rounded-lg-0 my-5 my-lg-0" id="login-block">
            <div class="m-auto w-lg-75 w-xl-50">
              <h2 class="text-info font-weight-light mb-5"><i class="fa fa-diamond"></i>&nbsp;Se connecter</h2>
              <form method="POST">
                <div class="form-group">
                  <label class="text-secondary">Email</label>
                  <input class="form-control" type="text" required="" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,15}$" inputmode="email" name="mailconnect">
                </div>
                <div class="form-group">
                  <label class="text-secondary">Mot de passe</label>
                  <input class="form-control" type="password" required="" name="mdpconnect">
                </div>
                <button class="btn btn-info mt-2" type="submit" name="formconnexion">Connexion</button>
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
