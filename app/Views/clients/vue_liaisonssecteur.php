<?php
$attributsTableau = ["table_open" => "<table class='table table-striped'>"];
$table = new \CodeIgniter\View\Table($attributsTableau);

$table->setHeading(['Secteur', 'Port de départ', 'N° liaison', 'Distance']);

if (!empty($lesLiaisons)) {
    foreach ($lesLiaisons as $uneLiaison) {
        $table->addRow([$uneLiaison->nosecteur, $uneLiaison->nomport_depart, $uneLiaison->noliaison, $uneLiaison->distance]);
    }
} else {
    $table->addRow("Aucune liaison trouvée");
}

echo $table->generate();
?>