<h2><?= $TitreDeLaPage ?></h2>

<?php
$attributsTableau = ["table_open" => "<table class='table table-striped'>"];
$table = new \CodeIgniter\View\Table($attributsTableau);

$table->setHeading([
    'Secteur',
    'Port départ',
    'Port arrivée',
    'N° Liaison',
    'Distance'
]);

foreach ($LesLiaisons as $uneLiaison) {
    $table->addRow([
        $uneLiaison->nomsecteur,
        $uneLiaison->portdepart,
        $uneLiaison->portarrivee,
        anchor('clients/liaison/' . $uneLiaison->NOLIAISON, $uneLiaison->NOLIAISON),
        $uneLiaison->DISTANCE
    ]);
}

echo $table->generate();
?>