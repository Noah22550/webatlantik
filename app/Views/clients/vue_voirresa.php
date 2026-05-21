<?php echo "<h1>" . $TitreDeLaPage . "</h1>" ?>
<table class="table table-bordered">
    <thead class="table-dark">
        <tr>
            <th>Numéro Réservation</th>
            <th>Date et Heure</th>
            <th>Montant Total</th>
            <th>Date et Heure de Départ</th>
            <th>Port de Départ</th>
            <th>Port d'Arrivée</th>
            <th>Payé</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($reservations as $reservation) : ?>
            <tr>
                <td><?= $reservation->NORESERVATION ?></td>
                <td><?= $reservation->DATEHEURE ?></td>
                <td><?= $reservation->MONTANTTOTAL ?> €</td>
                <td><?= $reservation->DATEHEUREDEPART ?></td>
                <td><?= $reservation->portdepart ?></td>
                <td><?= $reservation->portarrivee ?></td>
                <td class="<?= $reservation->PAYE ? 'text-success' : 'text-danger' ?>">
                    <?= $reservation->PAYE ? 'Oui' : 'Non' ?>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>

<?= $pager->links() ?>  