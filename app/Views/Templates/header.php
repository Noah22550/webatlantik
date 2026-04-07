<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atlantik</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    <span class="navbar-brand mb-0 h1" href="<?= site_url('accueil') ?>"> Atlantik </span> 
    <div class="d-flex align-items-center">
        <?php
        $session = session();
        if(!is_null($session->get('mel'))) : ?>
            <span class="text-white me-3">
                Connecté : <strong><?php echo $session->get('mel'); ?></strong>
            </span>
            <a class="btn btn-outline-light btn-sm me-2" href="<?php echo site_url('sedeconnecter') ?>">
                Se déconnecter
            </a>
            <?php if(!is_null($session->get('mel'))) : ?> 
                <a class="btn btn-warning btn-sm me-2" href="<?php echo site_url('liaisonssecteur') ?>">
                   Voir les liaisons
                </a>
            <?php endif; ?>
        <?php else : ?>
            <a class="btn btn-outline-light btn-sm me-2" href="<?php echo site_url('seconnecter') ?>">
                Se connecter
            </a>
        <?php endif; ?>
        <?php if (is_null($session->get('mel'))) : ?>
            <a class="btn btn-outline-light btn-sm me-2" href="<?php echo site_url('inscription') ?>">
                S'inscrire
            </a>
        <?php endif; ?>
        <?php if(!is_null($session->get('mel'))) : ?>
        <a class="btn btn-outline-light btn-sm me-2" href="<?php echo site_url('modifiercompte') ?>">
            modifier mon compte
        <?php endif; ?>
        <?php if(!is_null($session->get('mel'))) : ?>
            <a class="btn btn-outline-light btn-sm me-2" href="<?php echo site_url('affichertraverse') ?>">
                Voir les horaires des traversées
            </a>
        <?php endif; ?>
        </a>
    </div>
  </div>
</nav>
</div>
</body>
</html>
