<br><br><br>
<?php
if ($clientAjoute) { // true (1) si ajout, false (0) sinon
    echo 'vous êtes inscrit(e) avec succès !';
} else {
    echo 'oups, une erreur est survenue lors de votre inscription...';
}
?>
<br><br><br>
<p><a href="<?php echo site_url('acceuil') ?>">Retour à l'accueil</a></p>