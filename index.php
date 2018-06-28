<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Le Brin de Beauté</title>
    <?php include 'assets/php/allcss.php'; ?>
    <link href="https://fonts.googleapis.com/css?family=Tangerine" rel="stylesheet">
  </head>
  <body>
    <?php include 'assets/php/nav.php'; ?>

    <div class="container-fluid">
      <div class="bandeprincipale row">
        <div class="bg-white p-5 rounded my-4 my-lg-0" id="login-block">

          <h6 style="text-align: center; font-family: 'Tangerine', cursive; font-size: 6vw;">Le Brin de Beauté</h6>

          <div class="ensembleaccueil">

            <div class="part1accueil">
              <img src="assets/img/vitrine.jpg" alt="vitrine" class="imgvitrine">
              <p class="textvitrine"><b>L'institut Le Brin de Beauté</b><br><br>Installée depuis X années au Soler, Florence<br>vous accueille dans son institut: Le Brin de Beauté.<br>En plus de vos épilations, venez découvrir les soins et<br>produits proposés en partenariat avec les marques <br><br>
                <img src="assets/img/guinot-logo.png" alt="guinot" class="imgguinot">&nbsp;
                <img src="assets/img/thalgo-logo.png" alt="thalgo" class="imgthalgo">
              </p>
            </div>
            <div class="part2accueil">
              <img src="assets/img/interieur.jpg" alt="interieur" class="imginterieur">
              <p class="textinterieur"><b>Horaires : </b><br> Ouvert tous les jours du lundi au samedi <br><br> Lundi : 14h30 - 19h00 <br> Mardi : 9h00 - 19h00 <br> Mercredi : 9h00 - 12h00 <br> Jeudi : 9h00 - 19h00 <br> Vendredi : 9h00 - 19h00 <br> Samedi : 9h00 - 13h00 <br> Dimanche : Fermé</p>
            </div>
            <div class="part3accueil">
              <img src="assets/img/cabine1.jpg" alt="cabine1" class="imgcabine1">
              <p class="textcabine1"><b>Mes prestations:</b> <br><br>Pour retrouver les informations concernant l'emsemble de mes prestations <br> tel que les épilations, les soins du corps ou du visage <br><br>
                <button type="button" name="button" class="btn btn-info gradient btn-lg" onclick="window.location.href='services'"><i class="fa fa-angle-double-right" aria-hidden="true"></i>&nbsp;Infos&nbsp;<i class="fa fa-angle-double-left" aria-hidden="true"></i></button>
              <br><br><b>Chez vous:</b><br><br>Continuez ces soins bien-être chez vous!<br> Pour voir les produits disponibles <br><br>
                <button type="button" name="button" class="btn btn-info gradient btn-lg" onclick="window.location.href='catalogue'"><i class="fa fa-angle-double-right" aria-hidden="true"></i>&nbsp;Produits&nbsp;<i class="fa fa-angle-double-left" aria-hidden="true"></i></button>
              </p>
            </div>
            <div class="part4accueil">
              <img src="assets/img/cabine2.jpg" alt="cabine2" class="imgcabine2">
              <p class="textcabine2"><i class="fa fa-letter" aria-hidden="true"></i><b>Newsletter</b> <br><br> Pour profiter des offres promotionnelles vous pouvez <br> vous inscrire sur la newsletter, pour cela: <br><br>
                <button type="button" name="button" class="btn btn-info gradient btn-lg" onclick="window.location.href='inscription'"><i class="fa fa-angle-double-right" aria-hidden="true"></i>&nbsp;CLIQUEZ ICI&nbsp;<i class="fa fa-angle-double-left" aria-hidden="true"></i></button>
              </p>
            </div>

          </div>


        </div>
      </div>
    </div>

    <?php include 'assets/php/footer.php'; ?>
  </body>
</html>
