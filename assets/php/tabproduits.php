<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Description</th>
                <th>Catégorie</th>
                <th>Prix</th>
                <td> </td>
            </tr>
            <?php
            $reqproduit = $bdd->prepare("SELECT * FROM produit");
            $reqproduit->execute();
            $dbrep = $reqproduit->fetchAll();
            foreach ($dbrep as $row){
              echo "<tr>";
              echo "<td>".$row['LibelleProduit']."</td>"; //Affiche dans la colonne les infos de la bdd
              echo "<td>".$row['DescriptionProduit']."</td>";
              echo "<td>".$row['Categorie']."</td>";
              echo "<td>".$row['PrixProduit']."</td>";
              echo '<td><button class="btn btn-primary form-btn" onclick="document.location.href = \'modifierproduit.php?IDProduit='.$row["IDProduit"].'\'">Modifier</button></td>';
              echo "</tr>";
            }
            ?>
        </thead>
    </table>
</div>
