
    <?php include 'assets/php/allcss.php'; ?>

  <?php
    include 'include.php';
  ?>

    <div>
        <nav class="navbar navbar-light navbar-expand-md sticky-top navigation-clean-button" style="height:80px;background-color:#3c3d41;color:#ffffff;">
            <div class="container-fluid">
              <a class="navbar-brand" href="/accueil">
                <i class="fa fa-certificate" aria-hidden="true"></i>
                <div class="navbrand fa"><b>Le Brin de Beauté</b></div>
              </a>
              <button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav ml-auto">
                  <li class="nav-item" role="presentation"><a class="nav-link active" href="./accueil" style="color:#ffffff;"><i class="fa fa-home"></i>&nbsp;Accueil</a></li>
                  <li class="nav-item" role="presentation"><a class="nav-link active" href="./catalogue" style="color:#ffffff;"><i class="fa fa-shopping-bag" aria-hidden="true"></i>&nbsp;Produits</a></li>
                  <li class="nav-item" role="presentation"><a class="nav-link active" href="./services" style="color:#ffffff;"><i class="fa fa-american-sign-language-interpreting" aria-hidden="true"></i>&nbsp;Services</a></li>
                  <li class="nav-item" role="presentation"><a class="nav-link active" href="./inscription" style="color:#ffffff;"><i class="fa fa-user-circle-o"></i>&nbsp;S'inscrire</a></li>
                  <li class="nav-item" role="presentation"><a class="nav-link active" href="./connexion" style="color:#ffffff;"><i class="fa fa-sign-in"></i>&nbsp;Se connecter</a></li>

                  <?php
                  if (isset($_SESSION['id'])) {
                    if ($_SESSION['pseudo'] == 'Admin') {
                      $adminoption = '<a class="dropdown-item" role="presentation" href="/modifierproduits">Modifier les produits</a>';
                    } else {
                      $adminoption = ' ';
                    }

                    echo '
                    <li class="dropdown">
                      <a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#">
                        <span>'.$_SESSION['pseudo'].'</span>
                      </a>
                      <div class="dropdown-menu" role="menu">
                        <a class="dropdown-item" role="presentation" href="/editionprofil.php">Editer mon profil</a>
                        <a class="dropdown-item" role="presentation" href="/assets/php/deconnexion.php">Déconnexion</a>
                      </div>
                    </li>
                    ';
                  }else {
                    echo '
                    <li class="dropdown">
                      <a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#">Compte </a>
                      <div class="dropdown-menu" role="menu">
                        <a class="dropdown-item" role="presentation" href="/connexion.php">Identifiez vous !</a>
                        <a class="dropdown-item" role="presentation" href="/inscription.php">Nouveau client !</a>
                      </div>
                    </li>';
                  }

                   ?>
                </ul>
              </div>
            </div>
        </nav>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
