<h2 class="text-center my-4"><?= $TitreDeLaPage ?></h2>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow p-4">
                
                <?php
                if ($TitreDeLaPage == 'Saisie produit incorrecte') {
                    echo '<div class="alert alert-danger">';
                    echo service('validation')->listErrors();
                    echo '</div>';
                }

                echo form_open('inscription');
                echo csrf_field();
                ?>

                <div class="mb-3">
                    <label class="form-label">Nom</label>
                    <input type="text" name="txtnom" class="form-control" value="<?= set_value('txtnom'); ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Prénom</label>
                    <input type="text" name="txtprenom" class="form-control" value="<?= set_value('txtprenom'); ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Adresse</label>
                    <input type="text" name="txtadresse" class="form-control" value="<?= set_value('txtadresse'); ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Code postal</label>
                    <input type="text" name="txtcodepostal" class="form-control" value="<?= set_value('txtcodepostal'); ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Ville</label>
                    <input type="text" name="txtville" class="form-control" value="<?= set_value('txtville'); ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="txtmel" class="form-control" value="<?= set_value('txtmel'); ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Téléphone fixe</label>
                    <input type="text" name="txttelephonefixe" class="form-control" value="<?= set_value('txttelephonefixe'); ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Téléphone mobile</label>
                    <input type="text" name="txttelephonemobile" class="form-control" value="<?= set_value('txttelephonemobile'); ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Mot de passe</label>
                    <input type="password" name="txtmotdepasse" class="form-control">
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">
                        S'inscrire
                    </button>
                </div>

                <?= form_close(); ?>
            </div>
        </div>
    </div>
</div>