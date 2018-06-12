<div class="table-responsive">
    <table class="table" style="text-align:center">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Description</th>
                <th>Type</th>
                <th>Prix</th>
                <td> </td>
            </tr>
            <?php
            $reqservice = $bdd->prepare("SELECT * FROM service");
            $reqservice->execute();
            $dbrep = $reqservice->fetchAll();
            foreach ($dbrep as $row){
              echo "<tr>";
              echo "<td>".$row['LibelleService']."</td>"; //Affiche dans la colonne les infos de la bdd
              echo "<td>".$row['DescriptionService']."</td>";
              echo "<td>".$row['Type']."</td>";
              echo "<td>".$row['PrixService']."</td>";
              echo '<td><button class="btn btn-primary form-btn" onclick="document.location.href = \'modifierservice.php?IDService='.$row["IDService"].'\'">Modifier</button></td>';
              echo "</tr>";
            }
            ?>
        </thead>
    </table>
</div>
