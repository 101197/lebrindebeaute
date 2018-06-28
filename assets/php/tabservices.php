<div class="table-responsive">
    <table class="table" style="text-align:center">
      <h3>Epilation</h3>
        <thead>
            <tr>
              <th>Nom</th>
              <th>Description</th>
              <th>Durée</th>
              <th>Prix</th>
              <td> </td>
            </tr>
            <?php
            $reqservice = $bdd->prepare("SELECT * FROM service WHERE Type = (SELECT IDType FROM type WHERE LibelleType = 'Epilations')");
            $reqservice->execute();
            $dbrep = $reqservice->fetchAll();
            foreach ($dbrep as $row){
              echo "<tr>";
              echo "<td>".$row['LibelleService']."</td>"; //Affiche dans la colonne les infos de la bdd
              echo "<td>".$row['DescriptionService']."</td>";
              echo "<td>".$row['TempsService']."</td>";
              echo "<td>".$row['PrixService']." €</td>";
              echo '<td><button class="btn btn-primary form-btn" onclick="document.location.href = \'modifierservice.php?IDService='.$row["IDService"].'\'">Modifier</button></td>';
              echo "</tr>";
            }
            ?>
        </thead>
    </table>

    <table class="table" style="text-align:center">
      <h3>UVA</h3>
        <thead>
            <tr>
              <th>Nom</th>
              <th>Description</th>
              <th>Durée</th>
              <th>Prix</th>
              <td> </td>
            </tr>
            <?php
            $reqservice = $bdd->prepare("SELECT * FROM service WHERE Type = (SELECT IDType FROM type WHERE LibelleType = 'UVA')");
            $reqservice->execute();
            $dbrep = $reqservice->fetchAll();
            foreach ($dbrep as $row){
              echo "<tr>";
              echo "<td>".$row['LibelleService']."</td>"; //Affiche dans la colonne les infos de la bdd
              echo "<td>".$row['DescriptionService']."</td>";
              echo "<td>".$row['TempsService']."</td>";
              echo "<td>".$row['PrixService']." €</td>";
              echo '<td><button class="btn btn-primary form-btn" onclick="document.location.href = \'modifierservice.php?IDService='.$row["IDService"].'\'">Modifier</button></td>';
              echo "</tr>";
            }
            ?>
        </thead>
    </table>

    <table class="table" style="text-align:center">
      <h3>Soins du visage</h3>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Description</th>
                <th>Durée</th>
                <th>Prix</th>
                <td> </td>
            </tr>
            <?php
            $reqservice = $bdd->prepare("SELECT * FROM service WHERE Type = (SELECT IDType FROM type WHERE LibelleType = 'Soins du visage')");
            $reqservice->execute();
            $dbrep = $reqservice->fetchAll();
            foreach ($dbrep as $row){
              echo "<tr>";
              echo "<td>".$row['LibelleService']."</td>"; //Affiche dans la colonne les infos de la bdd
              echo "<td>".$row['DescriptionService']."</td>";
              echo "<td>".$row['TempsService']."</td>";
              echo "<td>".$row['PrixService']." €</td>";
              echo '<td><button class="btn btn-primary form-btn" onclick="document.location.href = \'modifierservice.php?IDService='.$row["IDService"].'\'">Modifier</button></td>';
              echo "</tr>";
            }
            ?>
        </thead>
    </table>

    <table class="table" style="text-align:center">
      <h3>Soins du corps</h3>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Description</th>
                <th>Durée</th>
                <th>Prix</th>
                <td> </td>
            </tr>
            <?php
            $reqservice = $bdd->prepare("SELECT * FROM service WHERE Type = (SELECT IDType FROM type WHERE LibelleType = 'Soins du corps')");
            $reqservice->execute();
            $dbrep = $reqservice->fetchAll();
            foreach ($dbrep as $row){
              echo "<tr>";
              echo "<td>".$row['LibelleService']."</td>"; //Affiche dans la colonne les infos de la bdd
              echo "<td>".$row['DescriptionService']."</td>";
              echo "<td>".$row['TempsService']."</td>";
              echo "<td>".$row['PrixService']." €</td>";
              echo '<td><button class="btn btn-primary form-btn" onclick="document.location.href = \'modifierservice.php?IDService='.$row["IDService"].'\'">Modifier</button></td>';
              echo "</tr>";
            }
            ?>
        </thead>
    </table>

    <table class="table" style="text-align:center">
      <h3>Autres soins</h3>
        <thead>
            <tr>
              <th>Nom</th>
              <th>Description</th>
              <th>Durée</th>
              <th>Prix</th>
              <td> </td>
            </tr>
            <?php
            $reqservice = $bdd->prepare("SELECT * FROM service WHERE Type = (SELECT IDType FROM type WHERE LibelleType = 'Autres soins')");
            $reqservice->execute();
            $dbrep = $reqservice->fetchAll();
            foreach ($dbrep as $row){
              echo "<tr>";
              echo "<td>".$row['LibelleService']."</td>"; //Affiche dans la colonne les infos de la bdd
              echo "<td>".$row['DescriptionService']."</td>";
              echo "<td>".$row['TempsService']."</td>";
              echo "<td>".$row['PrixService']." €</td>";
              echo '<td><button class="btn btn-primary form-btn" onclick="document.location.href = \'modifierservice.php?IDService='.$row["IDService"].'\'">Modifier</button></td>';
              echo "</tr>";
            }
            ?>
        </thead>
    </table>
</div>
