<h2 class="text-center my-4"><?php echo $TitreDeLaPage; ?></h2>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow p-4">

                <?php
                if ($TitreDeLaPage == 'Saisie incorrecte') {
                    echo '<div class="alert alert-danger">';
                    echo service('validation')->listErrors();
                    echo '</div>';
                }

                echo form_open('modifiercompte');
                echo csrf_field();
                ?>

                <div class="mb-3">
                    <label class="form-label">Nom</label>
                    <input type="text" name="txtNom" class="form-control" value="<?php echo set_value('txtNom', $client->NOM); ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Prénom</label>
                    <input type="text" name="txtPrenom" class="form-control" value="<?php echo set_value('txtPrenom', $client->PRENOM); ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Adresse</label>
                    <input type="text" name="txtAdresse" class="form-control" value="<?php echo set_value('txtAdresse', $client->ADRESSE); ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Code postal</label>
                    <input type="text" name="txtCodepostal" class="form-control" value="<?php echo set_value('txtCodepostal', $client->CODEPOSTAL); ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Ville</label>
                    <input type="text" name="txtVille" class="form-control" value="<?php echo set_value('txtVille', $client->VILLE); ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Téléphone fixe</label>
                    <input type="text" name="txtTelfixe" class="form-control" value="<?php echo set_value('txtTelfixe', $client->TELEPHONEFIXE); ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Téléphone portable</label>
                    <input type="text" name="txtTelportable" class="form-control" value="<?php echo set_value('txtTelportable', $client->TELEPHONEMOBILE); ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Adresse mel</label>
                    <input type="email" name="txtMel" class="form-control" value="<?php echo set_value('txtMel', $client->MEL); ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Mot de passe</label>
                    <input type="password" name="txtMotDePasse" class="form-control">
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">
                        Modifier les informations du compte
                    </button>
                </div>

                <?php echo form_close(); ?>

            </div>
        </div>
    </div>
</div>