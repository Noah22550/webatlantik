<?php
echo "<h1>" . $TitreDeLaPage . "</h1>";
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Formulaire généré dynamiquement</title>
</head>
<body>
  <h4>Pseudo-Panier</h4>
  <form action='traitementPanier.php' method='post'>
    <table border="1">
      <tr>
        <th>Libellé</th>
        <th>Tarifs</th>
        <th>Quantité</th>
      </tr>

      <?php 
      $i = 0;
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
      ?>

    </table>

    <br>
    <input type="submit" value="Valider panier">
  </form>
</body>
</html>