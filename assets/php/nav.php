<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar</title>
    <?php include 'assets/php/allcss.php'; ?>
</head>

<body>
    <div>
        <nav class="navbar navbar-light navbar-expand-md sticky-top navigation-clean-button" style="height:80px;background-color:#3c3d41;color:#ffffff;">
            <div class="container-fluid">
              <a class="navbar-brand">
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
                </ul>
              </div>
            </div>
        </nav>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
