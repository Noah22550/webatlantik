<h2 class="text-center my-4"><?= $TitreDeLaPage ?></h2>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow p-4">
                <?php
                if ($TitreDeLaPage=='Saisie incorrecte')
                    foreach($client as $unclient){
                 echo '<div class="alert alert-danger">'.service('validation')->listErrors().'</div>';
                    echo form_open('modifiercompte');
                    echo csrf_field();
                    
                    echo '<div class="mb-3">';
                    echo form_label('Nom : ','txtNom',$unclient->NOM, ['class' => 'form-label']);
                    echo form_input(['name' => 'txtNom', 'value' => set_value('txtNom'), 'class' => 'form-control']);
                    echo '</div>';

                    echo '<div class="mb-3">';
                    echo form_label('Prenom : ','txtPrenom',$unclient->PRENOM, ['class' => 'form-label']);
                    echo form_input(['name' => 'txtPrenom', 'value' => set_value('txtPrenom'), 'class' => 'form-control']);
                    echo '</div>';

                    echo '<div class="mb-3">';
                    echo form_label('Adresse : ','txtAdresse',$unclient->ADRESSE, ['class' => 'form-label']);
                    echo form_input(['name' => 'txtAdresse', 'value' => set_value('txtAdresse'), 'class' => 'form-control']);
                    echo '</div>';

                    echo '<div class="mb-3">';
                    echo form_label('Code Postal : ','txtCodepostal',$unclient->CODEPOSTAL, ['class' => 'form-label']);
                    echo form_input(['name' => 'txtCodepostal', 'value' => set_value('txtCodepostal'), 'class' => 'form-control']);
                    echo '</div>';

                    echo '<div class="mb-3">';
                    echo form_label('Ville : ','txtVille',$unclient->VILLE, ['class' => 'form-label']);
                    echo form_input(['name' => 'txtVille', 'value' => set_value('txtVille'), 'class' => 'form-control']);
                    echo '</div>';

                    echo '<div class="mb-3">';
                    echo form_label('Telephone fixe : ','txtTelfixe',$unclient->TELEPHONEFIXE, ['class' => 'form-label']);
                    echo form_input(['name' => 'txtTelfixe', 'value' => set_value('txtTelfixe'), 'class' => 'form-control']);
                    echo '</div>';

                    echo '<div class="mb-3">';
                    echo form_label('Telephone portable : ','txtTelportable',$unclient->TELEPHONEMOBILE, ['class' => 'form-label']);
                    echo form_input(['name' => 'txtTelportable', 'value' => set_value('txtTelportable'), 'class' => 'form-control']);
                    echo '</div>';

                    echo '<div class="mb-3">';
                    echo form_label('Adresse mel : ','txtMel',$unclient->MEl, ['class' => 'form-label']);
                    echo form_input(['name' => 'txtMel', 'value' => set_value('txtMel'), 'class' => 'form-control']);
                    echo '</div>';

                    echo '<div class="mb-3">';
                    echo form_label('Mot de passe : ','txtMotDePasse',$unclient->MOTDEPASSE, ['class' => 'form-label']);
                    echo form_input(['name' => 'txtMotDePasse', 'value' => set_value('txtMotDePasse'), 'class' => 'form-control']);
                    echo '</div>';

                    echo form_submit('submit', 'Modifier les informations du compte', ['class' => 'btn btn-primary w-100']);
                    echo form_close();
                }
                   
                ?>
            </div>
        </div>
    </div>
</div>