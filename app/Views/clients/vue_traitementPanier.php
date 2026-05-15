<?php echo "<h1>" . $TitreDeLaPage . "</h1>"; ?>
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
                echo 
                '<strong>Numero Traversée : </strong>'.$info->notraversee.'<br>' .
                '<strong>Liaison : </strong>'.$info->portdépart.' -> '.$info->portarrivé.'<br>'.
                '<strong> qui part le  : </strong>'.$info->dates.'<strong> à  : </strong>'.$info->heures.'<br>';
            }
            ?>
        </div>
</div>
<div class="card p-2 mb-2 bg-body rounded shadow-sm" style="max-width: 300px;">
    <h5 class="card-title mb-2">vous êtes</h5>
        <div class="card-body bg-light p-2 rounded">
        <?php
        foreach ($client as $unClient) {
            if ($unClient->NOCLIENT == session()->get('noclient')) {
                echo 
                '<strong>' . $unClient->NOM. ' '.$unClient->PRENOM.'<br>' .'</strong>'.
                '<strong>CP : </strong>'.$unClient->CODEPOSTAL.'<br>'.
                '<strong>Ville : </strong>'.$unClient->VILLE;
            }
        }
        ?>
    </div>
</div>
<div class="card p-2 mb-2 bg-body rounded shadow-sm" style="max-width: 300px;">
    <h5 class="card-title mb-2">et, vous avez réservez : </h5>
        <div class="card-body bg-light p-2 rounded">
        <?php

        ?>
    </div>
</div>
</center>