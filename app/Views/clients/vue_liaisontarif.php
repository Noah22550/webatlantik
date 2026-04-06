<table class="table table-bordered text-center align-middle">
    <thead class="table-secondary">
        <tr>
            <th>Catégorie</th>
            <th>Type</th>
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
                        $numperiode = 1;
                     foreach($tarif as $unTarif)
                            {
                                if ($unTarif->NOPERIODE == $numperiode && $unTarif->LETTRECATEGORIE == $unType->LETTRECATEGORIE && $unTarif->NOTYPE == $unType->NOTYPE )
                                { 
                                    echo '<td>'.$unTarif->TARIF.'</td>';
                                    $numperiode++;
                                }
                            } 
                    ?>     
                </tr>
            <?php endforeach; ?>
        <?php endforeach; ?>
    </tbody>
</table>