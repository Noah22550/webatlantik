<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-5 text-center">

    <?php if ($clientAjoute) : ?>
        <div class="alert alert-success" role="alert">
             Vous êtes inscrit(e) avec succès !
        </div>
    <?php else : ?>
        <div class="alert alert-danger" role="alert">
             Oups, une erreur est survenue lors de votre inscription...
        </div>
    <?php endif; ?>

    <a href="<?= site_url('acceuil') ?>" class="btn btn-primary mt-3">
        Retour à l'accueil
    </a>

</div>