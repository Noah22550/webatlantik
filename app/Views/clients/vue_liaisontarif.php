<h2><?= $TitreDeLaPage ?></h2>

<?php
$attributsTableau = ["table_open" => "<table class='table table-striped'>"];
$table = new \CodeIgniter\View\Table($attributsTableau);

$table->setHeading([
    'N° Liaison',
    'Port départ',
    'Port arrivée',
    'Lettre type',
    'Types',
    'Lettre catégorie',
    'Catégorie',
    'Date début',
    'Date fin',
    'Tarif'
]);

foreach ($lesTarifs as $untarif) {
    $table->addRow([
        $untarif->codeliaison,
        $untarif->portdépart,
        $untarif->portarrivé,
        $untarif->lettretype,
        $untarif->types,
        $untarif->lettrecatégorie,
        $untarif->catégorie,
        $untarif->DATEDEBUT,
        $untarif->DATEFIN,
        $untarif->tarif
    ]);
}

echo $table->generate();
?>