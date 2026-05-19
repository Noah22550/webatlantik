
    <?php echo "<h1>".$TitreDeLaPage."</h1>"?>
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
            <?php 
            foreach ($reservations as $reservation) {
                echo "<tr>";
                    echo "<td>".$reservation->NORESERVATION."</td>";
                    echo "<td>".$reservation->DATEHEURE."</td>";
                    echo "<td>".$reservation->MONTANTTOTAL." €</td>";
                    echo "<td>".$reservation->DATEHEUREDEPART."</td>";
                    echo "<td>".$reservation->portdepart."</td>";
                    echo "<td>".$reservation->portarrivee."</td>";
                    if($reservation->PAYE) {
                        echo "<td class='text-success'>Oui</td>";
                    } else {
                        echo "<td class='text-danger'>Non</td>";
                    }
                echo "</tr>";
            }
            
            
        echo "</tbody>";
   echo" </table>";
 echo $Pager->links();
 ?>