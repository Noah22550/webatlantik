<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-5" style="max-width: 500px;">

    <h2 class="text-center mb-4"><?= $TitreDeLaPage ?></h2>

    <?php if ($TitreDeLaPage == 'Saisie incorrecte') : ?>
        <div class="alert alert-danger">
            <?= service('validation')->listErrors(); ?>
        </div>
    <?php endif; ?>

    <?= form_open('seconnecter'); ?>
    <?= csrf_field(); ?>

    <!-- Email -->
    <div class="mb-3">
        <?= form_label('Email', 'txtmel', ['class' => 'form-label']); ?>
        <?= form_input([
            'name' => 'txtmel',
            'id' => 'txtmel',
            'value' => set_value('txtmel'),
            'class' => 'form-control',
            'placeholder' => 'Entrez votre email'
        ]); ?>
    </div>

    <!-- Mot de passe -->
    <div class="mb-3">
        <?= form_label('Mot de passe', 'txtMotDePasse', ['class' => 'form-label']); ?>
        <?= form_password([
            'name' => 'txtMotDePasse',
            'id' => 'txtMotDePasse',
            'value' => set_value('txtMotDePasse'),
            'class' => 'form-control',
            'placeholder' => 'Entrez votre mot de passe'
        ]); ?>
    </div>

    <!-- Bouton -->
    <div class="d-grid">
        <?= form_submit('submit', 'Se connecter', ['class' => 'btn btn-primary']); ?>
    </div>

    <?= form_close(); ?>

</div>