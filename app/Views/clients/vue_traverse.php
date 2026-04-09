 <div class="row justify-content">
        <div class="col-md-3">
            <div class="card shadow p-3 mb-5 bg-body rounded">
                <div class="card-body">
                    <h3 class="card-title">Horaires des traversées</h3>
                <?php foreach ($nomsecteur as $unSecteur) {
                    echo '<h3 class="link-danger link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">'.anchor('clients/affichertraverse/'.$unSecteur->NOM, $unSecteur->NOM).'</h3>';
                    echo '</h3>';
                }
                ?>
            </div>
        </div>
    </div>
    <!-- Card 2 : Formulaire créneau -->
    <div class="col-md-4">
        <div class="card shadow p-7 mb-8 bg-body rounded">
            <div class="card-body">
                <h3 class="card-title">Horaires des traversées</h3>
                Choisissez votre créneau :
                <br>
                    <select name="jour" class="form-select mb-2">
                        <option value="monday">Lundi</option>
                        <option value="tuesday">Mardi</option>
                        <option value="wednesday">Mercredi</option>
                        <option value="thursday">Jeudi</option>
                        <option value="friday">Vendredi</option>
                    </select>
                    <select name="partie_de_la_journee" class="form-select mb-1">
                        <option value="morning">Matin</option>
                        <option value="afternoon">Après-midi</option>
                        <option value="night">Soir</option>
                    </select>
                    <input type="submit" value="Valider" class="btn btn-danger mt-2">
            </div>
        </div>
    </div>

</div>