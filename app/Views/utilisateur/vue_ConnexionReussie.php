<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-5 text-center">

    <div class="alert alert-success">
        <h4 class="alert-heading">Connexion réussie !</h4>
        <p class="mb-0">Bienvenue <?= esc($mel) ?> 👋</p>
    </div>

    <a href="<?= site_url('acceuil') ?>" class="btn btn-primary mt-3">
        Retour à l'accueil
    </a>

</div>