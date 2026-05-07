<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Reservation</title>
</head>
<body>
<div class="card p-2 mb-2 bg-body rounded shadow-sm" style="max-width: 300px;">
        <div class="card-body bg-light p-2 rounded">
            <?php 
            foreach ($entete as $info) {
                echo 
                '<strong>Numero Traversée : </strong>'.$info->notraversee.'<br>' .
                '<strong>Liaison : </strong>'.$info->portdépart.' -> '.$info->portarrivé.'<br>';
            }
            ?>
        </div>
</div>
<div class="card p-2 mb-2 bg-body rounded shadow-sm" style="max-width: 300px;">
    <h5 class="card-title mb-2">Client</h5>
        <div class="card-body bg-light p-2 rounded">
        <?php 
        foreach ($client as $unClient) {
            if ($unClient->NOCLIENT == session()->get('noclient')) {
                echo 
                '<strong>Nom : </strong>'.$unClient->NOM.'<br>' .
                '<strong>Prénom : </strong>'.$unClient->PRENOM.'<br>' .
                '<strong>CP : </strong>'.$unClient->CODEPOSTAL.'<br>' .
                '<strong>Ville : </strong>'.$unClient->VILLE;
            }
        }
        ?>
    </div>
</div>
<div class="col-md-5">
    <h4>Reservation</h4>
    <form action='traitementPanier.php' method='post'>
        <table border="1">
        <tr>
            <th>Libellé</th>
            <th>Tarifs</th>
            <th>Quantitées</th>
        </tr>
        <?php 
        $i = 0;
        foreach ($libelle as $cat) {
                    echo "<tr>";
                        echo "<td>";
                            echo "<input type='hidden' name='libelle[$i][notype]' value='" . $cat->NOTYPE . "' />";
                            echo "<input type='hidden' name='libelle[$i][lettrecategorie]' value='" . $cat->lettre . "' />";
                            echo "<input type='hidden' name='libelle[$i][libelle]' value='" . $cat->libcat . "' />";
                            echo $cat->libcat . ' - ';
                        echo "</td>";
                            echo "<td>";
                                echo "<input type='hidden' name='libelle[$i][tarif]' value='" . $cat->TARIF . "' />";
                                echo $cat->TARIF . " €";
                            echo "</td>";
                        echo "<td>";
                            echo "<input type='number' name='libelle[$i][qte]' min='0' />";
                        echo "</td>";
                    echo "</tr>";
                    $i++;
                }
        ?>
    </table>
    <br>
        <input type="submit" value="Valider panier">
    </form>
</div>  
</body>
</html>