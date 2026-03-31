<h2><?php echo $TitreDeLaPage ?></h2>
<?php
  if ($TitreDeLaPage=='Saisie incorrecte')
    echo service('validation')->listErrors();
    /* set_value : en cas de non validation, les données déjà saisies sont réinjectées dans le formulaire */
    echo form_open('seconnecter');
    echo csrf_field();
    echo form_label('mel','txtmel');
    echo form_input('txtmel', set_value('txtmel'));    
    echo form_label('Mot de passe','txtMotDePasse');
    echo form_password('txtMotDePasse', set_value('txtMotDePasse'));    
    echo form_submit('submit', 'Se connecter');
    echo form_close();
?>