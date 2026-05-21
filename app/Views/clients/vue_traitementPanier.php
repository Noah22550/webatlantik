<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Reservation</title>
</head>
<body>
<center>

<div class="card p-2 mb-2 bg-body rounded shadow-sm" style="max-width: 300px;">
    <div class="card-body bg-light p-2 rounded">
        <?php
        foreach ($entete as $info) {
            echo '<strong>Numero Traversée : </strong>'.$info->notraversee.'<br>'.
                 '<strong>Liaison : </strong>'.$info->portdépart.' -> '.$info->portarrivé.'<br>'.
                 '<strong>qui part le : </strong>'.$info->dates.'<strong> à : </strong>'.$info->heures.'<br>';
        }
        ?>
    </div>
</div>

<div class="card p-2 mb-2 bg-body rounded shadow-sm" style="max-width: 300px;">
    <h5 class="card-title mb-2">Vous êtes</h5>
    <div class="card-body bg-light p-2 rounded">
        <?php
        echo '<strong>'.$client->NOM.' '.$client->PRENOM.'</strong><br>'.
             '<strong>CP : </strong>'.$client->CODEPOSTAL.'<br>'.
             '<strong>Ville : </strong>'.$client->VILLE;
        ?>
    </div>
</div>

<div class="card p-2 mb-2 bg-body rounded shadow-sm" style="max-width: 300px;">
    <h5 class="card-title mb-2">Vous avez réservé :</h5>
    <div class="card-body bg-light p-2 rounded">
        <?php
        foreach ($lignes as $ligne) {
            echo $ligne->LIBELLE.' : '.$ligne->QUANTITERESERVEE.'<br>';
        }
        ?>
        <br>
        <?php
            echo "<strong>Montant total :". $montanttotal ."€" ."</strong>"
        ?>
    </div>
</div>
<a href="<?php echo base_url('paiement'); ?>" class="btn btn-info mt-4">
     Payer
</a>

</center>
</body>
</html>