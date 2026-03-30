<h2><?php echo $TitreDeLaPage ?></h2>
<?php
if ($TitreDeLaPage == 'Saisie produit incorrecte')
 echo service('validation')->listErrors(); // affichage liste des erreurs, suite à erreur validation
echo form_open('inscription'); 
?>
<?php echo csrf_field(); ?>
<label for="txtnom">Nom</label>
<input type="input" name="txtnom" value="<?php echo set_value('txtnom'); ?>" /><br />
<label for="txtprenom">Prénom</label>
<input type="input" name="txtprenom" value="<?php echo set_value('txtprenom'); ?>" /><br />
<label for="txtadresse">Adresse</label>
<input type="input" name="txtadresse" value="<?php echo set_value('txtadresse'); ?>" /><br />
<label for="txtcode_postal">Code postal</label>
<input type="input" name="txtcodepostal" value="<?php echo set_value('txtcodepostal'); ?>" /><br />
<label for="txtville">Ville</label>
<input type="input" name="txtville" value="<?php echo set_value('txtville'); ?>" /><br />
<label for="txtemail">Email</label>
<input type="input" name="txtmel" value="<?php echo set_value('txtmel'); ?>" /><br />
<label for="txttelephonefixe">Numéro de téléphone fixe</label>
<input type="input" name="txttelephonefixe" value="<?php echo set_value('txttelephonefixe'); ?>" /><br />
<label for="txttelephoneportable">Numéro de téléphone portable</label>
<input type="input" name="txttelephonemobile" value="<?php echo set_value('txttelephonemobile'); ?>" /><br />
<label for="txtmot_de_passe">Mot de passe</label>
<input type="password" name="txtmotdepasse" value="<?php echo set_value('txtmotdepasse'); ?>" /><br />
<input type="submit" name="submit" value="s'inscrire !" />
<?php echo form_close(); ?>