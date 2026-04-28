<div class="row justify-content">
        <div class="col-md-3">
            <div class="card shadow p-3 mb-5 bg-body rounded">
                <div class="card-body">
                    <h3 class="card-title">Horaires des traversées</h3>
                <?php foreach ($nomsecteur as $unSecteur) {
                    echo '<h3 class="link-danger link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">'.anchor('traversetab/'.$unSecteur->NOSECTEUR, $unSecteur->NOM).'</h3>';
                }
                ?>
            </div>
        </div>
    </div>
    <!-- Card 2 : créneau -->
    <div class="col-md-4">
        <div class="card shadow p-10 mb-12">
            <div class="card-body">
                <h3 class="card-title">Horaires des traversées</h3>
                Choisissez votre créneau :
                <br>
                <form method = "post">
                    <select name="liaison" class="form-select mb-2">
                        <option value="liaison"><?php 
                        foreach ($uneliaison as $uneLiaison) {
                            echo "<option value='".$uneLiaison->NOLIAISON."'>".$uneLiaison->portdepart.' -> '.$uneLiaison->portarrivee."</option>";
                        }
                        ?></option>
                    </select>
                    <input type ="date" name="periode" class="form-control mb-2">
                    <input type="submit" value="Valider" class="btn btn-danger mt-2" name="bouton">
                </form>
            </div>
        </div>
        <!-- tableau : Affichage des résulstats -->
            <div class="container">
      <h2>Traversée</h2>
        <table class="table">
            <thead class="table-dark">
            <tr>
                <th>N°</th>
                <th>Heure</th>
                <th> Bateau </th>
                <?php foreach ($lescatégories as $categorie)
                {
                    echo "<th>". $categorie->LETTRECATEGORIE.' '.$categorie->LIBELLE. "</th>";
                }?>
            </tr>
        </thead>
        <tbody>
        <?php if (!isset($_POST['bouton'])) {
            echo '<tr>
                <td colspan="5">Aucune traversée disponible pour cette date.</td>
            </tr>';
            }
            else {
                foreach ($traversees as $uneTraversee) {
                    if ($_POST['liaison'] == $uneTraversee->NOLIAISON and $_POST['periode']) {   
                        echo "<tr>";
                            echo "<td>" .$uneTraversee->Numero ."</td>";
                            echo "<td>" . $uneTraversee->heure ." </td>" ;
                            echo "<td> " .$uneTraversee->NOM ." </td>";
                        echo "</tr>";
                    }
                }
            }
        ?>
        </tbody>
      </table>
    </div>
    </div>
</div>