<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 13px;
            color: #333;
        }
        h1 {
            text-align: center;
            color: #0d6efd;
        }
        .info {
            margin-bottom: 20px;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 15px;
        }
        th, td {
            border: 1px solid #aaa;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #343a40;
            color: white;
        }
        .paye {
            color: green;
            font-weight: bold;
        }
        .nonpaye {
            color: red;
            font-weight: bold;
        }
        .footer {
            margin-top: 40px;
            text-align: center;
            font-size: 11px;
            color: #888;
        }
    </style>
</head>
<body>

    <h1>Confirmation de réservation</h1>
    <!-- Infos client -->
    <div class="info">
        <p><strong>Client :</strong> <?php echo $client->NOM . ' ' . $client->PRENOM; ?></p>
        <p><strong>Email :</strong> <?php echo $client->MEL; ?></p>
        <p><strong>Téléphone :</strong> <?php echo $client->TELEPHONEMOBILE; ?></p>
    </div>
    <!-- Infos réservation -->
    <table>
        <tr>
            <th>Numéro de réservation</th>
            <td><?php echo $reservation->NORESERVATION; ?></td>
        </tr>
        <tr>
            <th>Date de réservation</th>
            <td><?php echo $reservation->DATEHEURE; ?></td>
        </tr>
        <tr>
            <th>Port de départ</th>
            <td><?php echo $reservation->portdepart; ?></td>
        </tr>
        <tr>
            <th>Port d'arrivée</th>
            <td><?php echo $reservation->portarrivee; ?></td>
        </tr>
        <tr>
            <th>Date et heure de départ</th>
            <td><?php echo $reservation->DATEHEUREDEPART; ?></td>
        </tr>
        <tr>
            <th>Montant total</th>
            <td><?php echo number_format($reservation->MONTANTTOTAL, 2); ?> €</td>
        </tr>
        <tr>
            <th>Statut paiement</th>
            <td>
                <?php if ($reservation->PAYE) : ?>
                    <span class="paye">Payé</span>
                <?php else : ?>
                    <span class="nonpaye">En attente</span>
                <?php endif; ?>
            </td>
        </tr>
    </table>

    <!-- Lignes réservation -->
    <h2>Détail de la réservation</h2>
    <table>
        <thead>
            <tr>
                <th>Catégorie</th>
                <th>Type</th>
                <th>Quantité réservée</th>
                <th>Quantité embarquée</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($lignes as $ligne) : ?>
            <tr>
                <td><?php echo $ligne->libelletarif; ?></td>
                <td><?php echo $ligne->QUANTITERESERVEE; ?></td>
                <td><?php echo $ligne->QUANTITEEMBARQUEE; ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <div class="footer">
        Document généré le <?php echo date('d/m/Y à H:i'); ?>
    </div>

</body>
</html>