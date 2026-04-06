<div class="mt-4">
    <table class="table table-bordered text-center align-middle">
        <thead class="table-secondary">
            <tr>
                <th>Catégorie</th>
                <th>Type</th>
                <th colspan="<?= count($periodes) ?>">Périodes</th>
            </tr>
            <tr>
                 <th colspan="2"></th>
                 <?php
                    foreach ($periodes as $unePeriode) : ?>
                        <th><?= $unePeriode->DATEDEBUT. '</br>' . $unePeriode->DATEFIN ?></th>
                    <?php endforeach; ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($categories as $cat) : ?>
                <?php foreach ($types as $type) : ?>
                    <?php if ($type->LETTRECATEGORIE !== $cat->LETTRECATEGORIE) continue; ?>
                    <tr>
                        <td><?= $cat->LETTRECATEGORIE ?> - <?= $cat->libelle ?></td>
                        <td><?= $cat->LETTRECATEGORIE . $type->NOTYPE ?> - <?= $type->libelle ?></td>
                        <?php 
                        foreach($tarifs as $unTarif)
                                {
                                    if ($unTarif->LETTRECATEGORIE === $cat->LETTRECATEGORIE && $unTarif->NOTYPE === $type->NOTYPE) {
                                        foreach ($periodes as $unePeriode) {
                                            if ($unePeriode->NOPERIODE == $unTarif->NOPERIODE) {
                                                echo '<td>' . $unTarif->TARIF . ' €</td>';
                                                break;
                                            }
                                        }
                                    }
                                } 
                        ?>     
                    </tr>
                <?php endforeach; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>