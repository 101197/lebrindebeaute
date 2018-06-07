<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Mon profil</title>
    <?php include 'assets/php/allcss.php'; ?>
  </head>
  <body>
    <?php include 'assets/php/nav.php'; ?>

    <div class="container-fluid">
      <div class="bandeprincipale row mh-100vh">
        <div class="col-10 col-sm-8 col-md-6 col-lg-6 offset-1 offset-sm-2 offset-md-3 offset-lg-0 d-lg-flex bg-white p-5 rounded rounded-lg-0 my-5 my-lg-0" id="login-block">

          <div class="designprofil">
            <?php
            $idclient = $_SESSION['id'];
            $requser = $bdd->prepare("SELECT * FROM client WHERE IDClient = ?");
            $requser->execute(array($idclient));
            $dbrep = $requser->fetch();
            ?>

            <img src="assets/img/profilneutre.png" alt="profil" class="imgprofilneutre">

            <h1 class="pseudoprofil"><?php echo $dbrep['Pseudo']; ?></h1>
            <ul class="infoprofil">
              <li><b>Nom: </b><?php echo $dbrep['Nom']; ?></li><br>
              <li><b>Prénom: </b><?php echo $dbrep['Prenom']; ?></li><br>
              <li><b>E-mail: </b><?php echo $dbrep['Mail']; ?></li><br>
              <li><b>Téléphone: </b><?php echo $dbrep['Telephone']; ?></li>
            </ul>
            <button type="button" name="button" class="btn btn-info mt-2" onclick="window.location.href='modifierclient'"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp;Modifier</button>
          </div>



        </div>
      </div>
    </div>

    <?php include 'assets/php/footer.php'; ?>
  </body>
</html>
