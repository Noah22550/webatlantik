<?php echo form_open('modifiercompte'); ?>
<?php echo csrf_field(); ?>
<center>
    <div class="card" style="width: 50rem;">
    <div class="card-body">
        <div class="mb-3">
            <?php echo form_label('Nom :', 'txtNom', ['class' => 'form-label']); ?>
            <?php echo form_input(['name' => 'txtNom', 'value' => set_value('txtNom', $client->NOM), 'class' => 'form-control']); ?>
        </div>

        <div class="mb-3">
            <?php echo form_label('Prénom :', 'txtPrenom', ['class' => 'form-label']); ?>
            <?php echo form_input(['name' => 'txtPrenom', 'value' => set_value('txtPrenom', $client->PRENOM), 'class' => 'form-control']); ?>
        </div>

        <div class="mb-3">
            <?php echo form_label('Adresse :', 'txtAdresse', ['class' => 'form-label']); ?>
            <?php echo form_input(['name' => 'txtAdresse', 'value' => set_value('txtAdresse', $client->ADRESSE), 'class' => 'form-control']); ?>
        </div>

        <div class="mb-3">
            <?php echo form_label('Code Postal :', 'txtCodepostal', ['class' => 'form-label']); ?>
            <?php echo form_input(['name' => 'txtCodepostal', 'value' => set_value('txtCodepostal', $client->CODEPOSTAL), 'class' => 'form-control']); ?>
        </div>

        <div class="mb-3">
            <?php echo form_label('Ville :', 'txtVille', ['class' => 'form-label']); ?>
            <?php echo form_input(['name' => 'txtVille', 'value' => set_value('txtVille', $client->VILLE), 'class' => 'form-control']); ?>
        </div>

        <div class="mb-3">
            <?php echo form_label('Téléphone fixe :', 'txtTelfixe', ['class' => 'form-label']); ?>
            <?php echo form_input(['name' => 'txtTelfixe', 'value' => set_value('txtTelfixe', $client->TELEPHONEFIXE), 'class' => 'form-control']); ?>
        </div>

        <div class="mb-3">
            <?php echo form_label('Téléphone portable :', 'txtTelportable', ['class' => 'form-label']); ?>
            <?php echo form_input(['name' => 'txtTelportable', 'value' => set_value('txtTelportable', $client->TELEPHONEMOBILE), 'class' => 'form-control']); ?>
        </div>

        <div class="mb-3">
            <?php echo form_label('Adresse mel :', 'txtMel', ['class' => 'form-label']); ?>
            <?php echo form_input(['name' => 'txtMel', 'value' => set_value('txtMel', $client->MEL), 'class' => 'form-control']); ?>
        </div>

        <div class="mb-3">
            <?php echo form_label('Mot de passe :', 'txtMotDePasse', ['class' => 'form-label']); ?>
            <?php echo form_input(['name' => 'txtMotDePasse', 'value' => set_value('txtMotDePasse', $client->MOTDEPASSE), 'class' => 'form-control', 'type' => 'password']); ?>
        </div>

        <?php echo form_submit('submit', 'Modifier les informations du compte', ['class' => 'btn btn-primary w-100']); ?>
        <?php echo form_close(); ?>
        </div>
    </div>
</center>