<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow p-4 text-center border-success">

                <h2 class="text-success mb-4"> Paiement accepté !</h2>

                <p><strong>Montant payé :</strong> <?php echo $montant; ?> €</p>
                <p><strong>Référence commande :</strong> <?php echo $reference; ?></p>
                <p><strong>Numéro d'autorisation :</strong> <?php echo $auto; ?></p>

                <a href="<?php echo base_url('voirresa'); ?>" class="btn btn-success mt-3">
                    Voir mes réservations
                </a>

            </div>
        </div>
    </div>
</div>