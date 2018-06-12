<div class="table-responsive">
    <table class="table" style="text-align:center">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>E-mail</th>
                <th>Téléphone</th>
                <td> </td>
            </tr>
            <?php
            $reqclient = $bdd->prepare("SELECT * FROM client");
            $reqclient->execute();
            $dbrep = $reqclient->fetchAll();
            foreach ($dbrep as $row){
              echo "<tr>";
              echo "<td>".$row['Nom']."</td>"; //Affiche dans la colonne les infos de la bdd
              echo "<td>".$row['Prenom']."</td>";
              echo "<td>".$row['Mail']."</td>";
              echo "<td>".$row['Telephone']."</td>";
              echo '<td><button class="btn btn-primary form-btn" onclick="document.location.href = \'modifierclient.php?IDClient='.$row["IDClient"].'\'">Modfier</button></td>';
              echo "</tr>";
            }
            ?>
        </thead>
    </table>
</div>
