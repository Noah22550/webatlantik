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
                    <th colspan="<?= count($periode) ?>">Période</th>
                </tr>
                <tr>
                    <?php 
                    foreach ($periode as $unePeriode) : ?>
                        <th><?= $unePeriode->DATEDEBUT. '</br>' . $unePeriode->DATEFIN ?></th>
                    <?php endforeach; ?>
                </tr>
            </thead>

            <tbody>
                <!-- Catégorie A -->
                <tr>
                    <td rowspan="2" class="fw-bold">A<br>Passager</td>
                </tr>

                <!-- Catégorie B -->
                <tr>
                    <td rowspan="2" class="fw-bold">B<br>Véh.inf.2m</td>
                </tr>

                <!-- Catégorie C -->
                <tr>
                    <td rowspan="2" class="fw-bold">C<br>Véh.sup.2m</td>
                        
                </tr>
            </tbody>
        </table>
    </div>
</div>