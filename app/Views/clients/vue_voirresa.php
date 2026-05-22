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
            <th>PDF</th>
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
                <td> <?php if ($reservation->PAYE) {
                        echo '<span class="text-success">Oui</span>';
                    }
                    else {
                         echo '<span class="text-danger">Non</span>';
                    }
                       
                     ?>
                </td>
                <td>
                    <a href="<?php echo base_url('pdf/reservation/' . $reservation->NORESERVATION); ?>" 
                    class="btn btn-sm btn-outline-primary" target="_blank">
                         PDF
                    </a>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>


<?= $pager->links() ?>  