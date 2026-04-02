<h2><?php echo $TitreDeLaPage ?></h2>
<?php
$attributsTableau = ["table_open" => "<table class='table table-striped'>",]; // classe Bootstrap
$table = new \CodeIgniter\View\Table($attributsTableau);
$table->setHeading(['n° Commande', 'n° Client', 'Date', 'Réf. Produit',
'Quantité commandée', 'Libellé', 'Prix HT']); // entête tableau
echo $table->generate($lesliaisons);
echo "<table class='table table-striped'>";
echo "
<tr>
<th>n° Commande</th>
<th>n° Client</th>
<th>Date</th>
<th>Réf. Produit</th>
<th>Quantité commandée</th>
<th>Libellé</th>
<th>Prix HT</th>
</tr>";

foreach ($lesliaisons as $uneLiaison)
{
    echo "<TR>";
    echo "<TD>".$uneLiaison-> nomsecteur."</TD><TD>"
    .$uneLiaison->portdepart."</TD><TD>"
    .$uneLiaison->portarrivee."</TD><TD>"
    .$uneLiaison->noliaison."</TD><TD>"
    .$uneLiaison->distance."</TD><TD>";
    echo "</TR>";
}
echo "</table>";
?>