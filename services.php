<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services</title>
    <?php include 'assets/php/allcss.php'; ?>
</head>

<body>
  <?php
  include 'assets/php/nav.php';


    ?>


    <div class="card">
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs" role="tablist">
                <li class="nav-item"><a class="nav-link active" href="#item-1-1" id="item-1-1-tab" data-toggle="tab" role="tab" aria-controls="item-1-1" aria-selected="true">Epilation</a></li>
                <li class="nav-item"><a class="nav-link" href="#item-1-2" id="item-1-2-tab" data-toggle="tab" role="tab" aria-controls="item-1-2" aria-selected="false">UVA</a></li>
                <li class="nav-item"><a class="nav-link" href="#item-1-3" id="item-1-3-tab" data-toggle="tab" role="tab" aria-controls="item-1-3" aria-selected="false">Soin du visage</a></li>
                <li class="nav-item"><a class="nav-link" href="#item-1-4" id="item-1-4-tab" data-toggle="tab" role="tab" aria-controls="item-1-4" aria-selected="false">Soins du corps</a></li>
                <li class="nav-item"><a class="nav-link" href="#item-1-5" id="item-1-5-tab" data-toggle="tab" role="tab" aria-controls="item-1-5" aria-selected="false">Autres soins</a></li>

            </ul>
        </div>
        <div class="card-body">
            <div id="nav-tabContent" class="tab-content">
              <!-- ONGLET 1 -->
                <div id="item-1-1" class="tab-pane fade show active" role="tabpanel" aria-labelledby="item-1-1-tab">
                  <div class="table-responsive">
                      <table class="table" style="text-align:center">
                        <h3>Femme</h3>
                          <thead>
                              <tr>
                                <th>Nom</th>
                                <th>Prix</th>
                              </tr>
                              <?php
                              $reqservice = $bdd->prepare("SELECT * FROM service WHERE SousType = (SELECT IDSousType FROM soustype WHERE LibelleSousType = 'Femme')");
                              $reqservice->execute();
                              $dbrep = $reqservice->fetchAll();
                              foreach ($dbrep as $row){
                                echo "<tr>";
                                echo "<td>".$row['LibelleService']."</td>"; //Affiche dans la colonne les infos de la bdd
                                echo "<td>".$row['PrixService']." €</td>";
                                echo "</tr>";
                              }
                              ?>
                          </thead>
                      </table>
                      <table class="table" style="text-align:center">
                        <h3>Homme</h3>
                          <thead>
                              <tr>
                                <th>Nom</th>
                                <th>Prix</th>
                              </tr>
                              <?php
                              $reqservice = $bdd->prepare("SELECT * FROM service WHERE SousType = (SELECT IDSousType FROM soustype WHERE LibelleSousType = 'Homme')");
                              $reqservice->execute();
                              $dbrep = $reqservice->fetchAll();
                              foreach ($dbrep as $row){
                                echo "<tr>";
                                echo "<td>".$row['LibelleService']."</td>"; //Affiche dans la colonne les infos de la bdd
                                echo "<td>".$row['PrixService']." €</td>";
                                echo "</tr>";
                              }
                              ?>
                          </thead>
                      </table>
                    </div>
                </div>

                <!-- ONGLET 2 -->
                <div id="item-1-2" class="tab-pane fade" role="tabpanel" aria-labelledby="item-1-2-tab">
                  <div class="table-responsive">
                      <table class="table" style="text-align:center">
                        <h3>UVA</h3>
                          <thead>
                              <tr>
                                <th>Nom</th>
                                <th>Prix</th>
                              </tr>
                              <?php
                              $reqservice = $bdd->prepare("SELECT * FROM service WHERE Type = (SELECT IDType FROM type WHERE LibelleType = 'UVA')");
                              $reqservice->execute();
                              $dbrep = $reqservice->fetchAll();
                              foreach ($dbrep as $row){
                                echo "<tr>";
                                echo "<td>".$row['LibelleService']."</td>"; //Affiche dans la colonne les infos de la bdd
                                echo "<td>".$row['PrixService']." €</td>";
                                echo "</tr>";
                              }
                              ?>
                          </thead>
                      </table>
                    </div>
              </div>

              <!-- ONGLET 3 -->
              <div id="item-1-3" class="tab-pane fade" role="tabpanel" aria-labelledby="item-1-3-tab">
                <div class="table-responsive">
                    <table class="table" style="text-align:center">
                      <h3>Soins Guinot</h3>
                        <thead>
                            <tr>
                              <th>Nom</th>
                              <th>Description</th>
                              <th>Durée</th>
                              <th>Prix</th>

                            </tr>
                            <?php
                            $reqservice = $bdd->prepare("SELECT * FROM service WHERE SousType = (SELECT IDSousType FROM soustype WHERE LibelleSousType = 'Soins Guinot')");
                            $reqservice->execute();
                            $dbrep = $reqservice->fetchAll();
                            foreach ($dbrep as $row){
                              echo "<tr>";
                              echo "<td>".$row['LibelleService']."</td>"; //Affiche dans la colonne les infos de la bdd
                              echo "<td>".$row['DescriptionService']."</td>";
                              echo "<td>".$row['TempsService']."</td>";
                              echo "<td>".$row['PrixService']." €</td>";
                              echo "</tr>";
                            }
                            ?>
                        </thead>
                    </table>
                    <table class="table" style="text-align:center">
                      <h3>Soins Thalgo</h3>
                        <thead>
                            <tr>
                              <th>Nom</th>
                              <th>Description</th>
                              <th>Durée</th>
                              <th>Prix</th>

                            </tr>
                            <?php
                            $reqservice = $bdd->prepare("SELECT * FROM service WHERE SousType = (SELECT IDSousType FROM soustype WHERE LibelleSousType = 'Soins Thalgo')");
                            $reqservice->execute();
                            $dbrep = $reqservice->fetchAll();
                            foreach ($dbrep as $row){
                              echo "<tr>";
                              echo "<td>".$row['LibelleService']."</td>"; //Affiche dans la colonne les infos de la bdd
                              echo "<td>".$row['DescriptionService']."</td>";
                              echo "<td>".$row['TempsService']."</td>";
                              echo "<td>".$row['PrixService']." €</td>";
                              echo "</tr>";
                            }
                            ?>
                        </thead>
                    </table>
                    <table class="table" style="text-align:center">
                      <h3>Soins anti-âge marin</h3>
                        <thead>
                            <tr>
                              <th>Nom</th>
                              <th>Description</th>
                              <th>Durée</th>
                              <th>Prix</th>

                            </tr>
                            <?php
                            $reqservice = $bdd->prepare("SELECT * FROM service WHERE SousType = (SELECT IDSousType FROM soustype WHERE LibelleSousType = 'Soins Anti-âge marin')");
                            $reqservice->execute();
                            $dbrep = $reqservice->fetchAll();
                            foreach ($dbrep as $row){
                              echo "<tr>";
                              echo "<td>".$row['LibelleService']."</td>"; //Affiche dans la colonne les infos de la bdd
                              echo "<td>".$row['DescriptionService']."</td>";
                              echo "<td>".$row['TempsService']."</td>";
                              echo "<td>".$row['PrixService']." €</td>";
                              echo "</tr>";
                            }
                            ?>
                        </thead>
                    </table>
                  </div>
              </div>

              <!-- ONGLET 4 -->
              <div id="item-1-4" class="tab-pane fade" role="tabpanel" aria-labelledby="item-1-4-tab">
                <div class="table-responsive">
                    <table class="table" style="text-align:center">
                      <h3>Modelage</h3>
                        <thead>
                            <tr>
                              <th>Nom</th>
                              <th>Description</th>
                              <th>Durée</th>
                              <th>Prix</th>

                            </tr>
                            <?php
                            $reqservice = $bdd->prepare("SELECT * FROM service WHERE SousType = (SELECT IDSousType FROM soustype WHERE LibelleSousType = 'Modelage')");
                            $reqservice->execute();
                            $dbrep = $reqservice->fetchAll();
                            foreach ($dbrep as $row){
                              echo "<tr>";
                              echo "<td>".$row['LibelleService']."</td>"; //Affiche dans la colonne les infos de la bdd
                              echo "<td>".$row['DescriptionService']."</td>";
                              echo "<td>".$row['TempsService']."</td>";
                              echo "<td>".$row['PrixService']." €</td>";
                              echo "</tr>";
                            }
                            ?>
                        </thead>
                    </table>
                    <table class="table" style="text-align:center">
                      <h3>Minceur</h3>
                        <thead>
                            <tr>
                              <th>Nom</th>
                              <th>Description</th>
                              <th>Durée</th>
                              <th>Prix</th>

                            </tr>
                            <?php
                            $reqservice = $bdd->prepare("SELECT * FROM service WHERE SousType = (SELECT IDSousType FROM soustype WHERE LibelleSousType = 'Minceur')");
                            $reqservice->execute();
                            $dbrep = $reqservice->fetchAll();
                            foreach ($dbrep as $row){
                              echo "<tr>";
                              echo "<td>".$row['LibelleService']."</td>"; //Affiche dans la colonne les infos de la bdd
                              echo "<td>".$row['DescriptionService']."</td>";
                              echo "<td>".$row['TempsService']."</td>";
                              echo "<td>".$row['PrixService']." €</td>";
                              echo "</tr>";
                            }
                            ?>
                        </thead>
                    </table>
                  </div>
              </div>

              <!-- ONGLET 5 -->
              <div id="item-1-5" class="tab-pane fade" role="tabpanel" aria-labelledby="item-1-5-tab">
                <div class="table-responsive">
                    <table class="table" style="text-align:center">
                      <h3>Autres soins</h3>
                        <thead>
                            <tr>
                              <th>Nom</th>
                              <th>Prix</th>
                            </tr>
                            <?php
                            $reqservice = $bdd->prepare("SELECT * FROM service WHERE Type = (SELECT IDType FROM type WHERE LibelleType = 'Autres soins')");
                            $reqservice->execute();
                            $dbrep = $reqservice->fetchAll();
                            foreach ($dbrep as $row){
                              echo "<tr>";
                              echo "<td>".$row['LibelleService']."</td>"; //Affiche dans la colonne les infos de la bdd
                              echo "<td>".$row['PrixService']." €</td>";
                              echo "</tr>";
                            }
                            ?>
                        </thead>
                    </table>
                  </div>
            </div>
    </div>
    </div>
    </div>
    <?php

    include 'assets/php/footer.php'; ?>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
