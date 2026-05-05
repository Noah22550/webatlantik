<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Reservation</title>
</head>
<body>
<div class="card p-2 mb-2 bg-body rounded shadow-sm" style="max-width: 300px;">
    <h5 class="card-title mb-2">Client</h5>
        <div class="card-body bg-light p-2 rounded">
        <?php 
        foreach ($libelle as $info) {
        }
        ?>
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
      if (empty($libelle) || empty($tarif)) {
        echo "<div class='alert alert-danger' role='alert'>";
            echo "pas de tarif pour cette traversée";
        echo "</div>";
      } else {
                foreach ($libelle as $cat) {
                foreach ($tarif as $unTarif) {
                echo "<tr>";
                    echo "<td>";
                        echo "<input type='hidden' name='libelle[$i][Id]' value='" . $cat->libcat . "' />";
                        echo $cat->libcat . ' - ';
                    echo "</td>";
                        echo "<td>";
                            echo "<input type='hidden' name='libelle[$i][Id]' value='" . $unTarif->TARIF . "' />";
                            echo $unTarif->TARIF . " €";
                        echo "</td>";
                    echo "<td>";
                        echo "<input type='number' name='[$i][qte]' min='0' />";
                    echo "</td>";
                echo "</tr>";
                $i++;
                }
            }
        }
    ?>
</table>
<br>
    <input type="submit" value="Valider panier">
</form>    
</body>
</html>