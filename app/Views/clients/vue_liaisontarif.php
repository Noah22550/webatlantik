<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-4">
    <h2 class="text-center"><?= $TitreDeLaPage ?></h2>
    <div class="table-responsive">
        <table class="table table-bordered table-striped text-center align-middle">
            
            <caption class="caption-top text-center fw-bold">
                Compagnie Atlantik - Tarifs en euros
            </caption>

            <thead class="table-dark">
                <tr>
                    <th rowspan="2">Catégorie</th>
                    <th rowspan="2">Type</th>
                    <th colspan="<?= count($periode) ?>">Période</th>>
                </tr>
                <tr>
                    <?php 
                    foreach ($periode as $unePeriode) : ?>
                        <th><?= $unePeriode->DATEDEBUT. '</br>' . $unePeriode->DATEFIN ?></th>
                    <?php endforeach; ?>
                </tr>
            </thead>

            <tbody>
              <tbody>
                <!-- Catégorie A -->
                <tr>
                    <td rowspan="3" class="fw-bold">A<br>Passager</td>
                    <td>A1 - Adulte</td>
                    <td>18.00</td>
                    <td>20.00</td>
                    <td>19.00</td>
                </tr>
                <tr>
                    <td>A2 - Junior 8 à 18 ans</td>
                    <td>11.10</td>
                    <td>13.10</td>
                    <td>12.10</td>
                </tr>
                <tr>
                    <td>A3 - Enfant 0 à 7 ans</td>
                    <td>5.60</td>
                    <td>7.00</td>
                    <td>6.40</td>
                </tr>

                <!-- Catégorie B -->
                <tr>
                    <td rowspan="2" class="fw-bold">B<br>Véh.inf.2m</td>
                    <td>B1 - Voiture long.inf.4m</td>
                    <td>86.00</td>
                    <td>95.00</td>
                    <td>91.00</td>
                </tr>
                <tr>
                    <td>B2 - Voiture long.inf.5m</td>
                    <td>129.00</td>
                    <td>142.00</td>
                    <td>136.00</td>
                </tr>

                <!-- Catégorie C -->
                <tr>
                    <td rowspan="3" class="fw-bold">C<br>Véh.sup.2m</td>
                    <td>C1 - Fourgon</td>
                    <td>189.00</td>
                    <td>208.00</td>
                    <td>199.00</td>
                </tr>
                <tr>
                    <td>C2 - Camping Car</td>
                    <td>205.00</td>
                    <td>226.00</td>
                    <td>216.00</td>
                </tr>
                <tr>
                    <td>C3 - Camion</td>
                    <td>268.00</td>
                    <td>295.00</td>
                    <td>282.00</td>
                </tr>
            </tbody>

        </table>
    </div>
</div>