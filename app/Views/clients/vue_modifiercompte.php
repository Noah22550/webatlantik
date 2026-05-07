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

                <!-- Nom -->
                <input type="text" name="txtnom" class="form-control" 
                    value="<?= set_value('txtnom', esc($client['nom'])) ?>">

                <!-- Prénom -->
                <input type="text" name="txtprenom" class="form-control" 
                    value="<?= set_value('txtprenom', esc($client['prenom'])) ?>">

                <!-- Adresse -->
                <input type="text" name="txtadresse" class="form-control" 
                    value="<?= set_value('txtadresse', esc($client['adresse'])) ?>">

                <!-- Code postal -->
                <input type="text" name="txtcodepostal" class="form-control" 
                    value="<?= set_value('txtcodepostal', esc($client['codepostal'])) ?>">

                <!-- Ville -->
                <input type="text" name="txtville" class="form-control" 
                    value="<?= set_value('txtville', esc($client['ville'])) ?>">

                <!-- Email -->
                <input type="email" name="txtmel" class="form-control" 
                    value="<?= set_value('txtmel', esc($client['mel'])) ?>">

                <!-- Téléphone fixe -->
                <input type="text" name="txttelephonefixe" class="form-control" 
                    value="<?= set_value('txttelephonefixe', esc($client['telephonefixe'])) ?>">

                <!-- Téléphone mobile -->
                <input type="text" name="txttelephonemobile" class="form-control" 
                    value="<?= set_value('txttelephonemobile', esc($client['telephonemobile'])) ?>">

                <?= form_close(); ?>
            </div>
        </div>
    </div>
</div>