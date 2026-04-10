 <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card shadow p-3 mb-5 bg-body rounded">
                <div class="card-body">
                    <h3 class="card-title">avant de continuez, choisissez un secteur</h3>
                <?php foreach ($nomsecteur as $unSecteur) {
                    echo '<h3 class="link-danger link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">'.anchor('traversetab/'.$unSecteur->NOSECTEUR, $unSecteur->NOM).'</h3>';
                    echo '</h3>';
                }
                ?>
            </div>
        </div>
    </div>