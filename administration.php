<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration</title>
    <?php include 'assets/php/allcss.php'; ?>
</head>

<body>
  <?php
  include 'assets/php/nav.php';

  if (isset($_SESSION['id'])) {
    ?>


    <div class="card">
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs" role="tablist">
                <li class="nav-item"><a class="nav-link active" href="#item-1-1" id="item-1-1-tab" data-toggle="tab" role="tab" aria-controls="item-1-1" aria-selected="true">Clients</a></li>
                <li class="nav-item"><a class="nav-link" href="#item-1-2" id="item-1-2-tab" data-toggle="tab" role="tab" aria-controls="item-1-2" aria-selected="false">Services</a></li>
                <li class="nav-item"><a class="nav-link" href="#item-1-3" id="item-1-3-tab" data-toggle="tab" role="tab" aria-controls="item-1-3" aria-selected="false">Produits</a></li>
            </ul>
        </div>
        <div class="card-body">
            <div id="nav-tabContent" class="tab-content">
                <div id="item-1-1" class="tab-pane fade show active" role="tabpanel" aria-labelledby="item-1-1-tab">
                  <h4>Mes clients
                    <button class="btn btn-info mt-2 float-right" onclick="document.location.href='inscriptionadmin.php'">Nouvel administrateur</button>
                  </h4>
                  <br>
                  <?php include 'assets/php/tabclients.php'; ?>

                  <!--<button class="btn btn-primary" type="button">Button</button>-->
                </div>
                <div id="item-1-2" class="tab-pane fade" role="tabpanel" aria-labelledby="item-1-2-tab">
                  <h4>Mes services
                    <button class="btn btn-info mt-2 float-right" onclick="document.location.href='ajoutservice.php'">Nouveau service</button>
                  </h4>
                  <?php include 'assets/php/tabservices.php'; ?>

                    <!--<button class="btn btn-primary" type="button">Button</button>-->
                </div>
                <div id="item-1-3" class="tab-pane fade" role="tabpanel" aria-labelledby="item-1-3-tab">
                  <h4>Mes produits
                    <button class="btn btn-info mt-2 float-right" onclick="document.location.href='ajoutproduit.php'">Nouveau produit</button>
                </h4>
                  <?php include 'assets/php/tabproduits.php'; ?>

                <!--<button class="btn btn-primary" type="button">Button</button>-->
                </div>
    </div>
    </div>
    </div>
    <?php
  }else {
    echo "Vous n'avez pas les droits pour acceder à cette page.";
  }
    include 'assets/php/footer.php'; ?>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
