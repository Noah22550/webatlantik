<?php echo "<h1>" . $TitreDeLaPage . "</h1>"; ?>
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
    <h5 class="card-title mb-2">Liaison</h5>
        <div class="card-body bg-light p-2 rounded">
        <?php
        ?>
    </div>
</div>