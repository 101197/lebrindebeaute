<div class="table-responsive">
    <table class="table" style="text-align:center">
        <thead>
            <tr>
                <th>Pseudo</th>
                <th>E-mail</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Téléphone</th>
            </tr>
            <?php
            $reqadmin = $bdd->prepare("SELECT * FROM admin");
            $reqadmin->execute();
            $dbrep = $reqadmin->fetchAll();
            foreach ($dbrep as $row){
              echo "<tr>";
              echo "<td>".$row['PseudoAdmin']."</td>";
              echo "<td>".$row['MailAdmin']."</td>";
              echo "<td>".$row['NomAdmin']."</td>"; //Affiche dans la colonne les infos de la bdd
              echo "<td>".$row['PrenomAdmin']."</td>";
              echo "<td>".$row['TelephoneAdmin']."</td>";
              echo "</tr>";
            }
            ?>
        </thead>
    </table>
</div>
