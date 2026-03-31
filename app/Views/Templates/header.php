<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Les plantes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    <span class="navbar-brand mb-0 h1">Bienvenue sur le site officiel d'Atlantik !! </span> 
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
            <?php if ($session->get('profil') == 'Administrateur') : ?>
                <a class="btn btn-warning btn-sm me-2" href="<?php echo site_url('ajouterplante') ?>">
                    Ajouter
                </a>
            <?php endif; ?>
        <?php else : ?>
            <a class="btn btn-outline-light btn-sm me-2" href="<?php echo site_url('seconnecter') ?>">
                Se connecter
            </a>
        <?php endif; ?>
        <a class="btn btn-outline-light btn-sm me-2" href="<?php echo site_url('inscription') ?>">
        pas encore de compte ? inscrivez-vous !

        </a>
        <a class="btn btn-outline-light btn-sm me-2" href="<?php echo site_url('listerRegion') ?>">
            Par région
        </a>
    </div>
  </div>
</nav>
</div>
</body>
</html>
