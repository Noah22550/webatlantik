<h2 class="text-center my-4"><?php echo $TitreDeLaPage; ?></h2>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow p-4 text-center">

                <p class="mb-4">Vous allez être redirigé vers la plateforme sécurisée PayBox.</p>

                <form method="POST" action="<?php echo $serveurOK; ?>">
                    <input type="hidden" name="PBX_SITE"        value="<?php echo $pbx_site; ?>">
                    <input type="hidden" name="PBX_RANG"        value="<?php echo $pbx_rang; ?>">
                    <input type="hidden" name="PBX_IDENTIFIANT" value="<?php echo $pbx_identifiant; ?>">
                    <input type="hidden" name="PBX_TOTAL"       value="<?php echo $pbx_total; ?>">
                    <input type="hidden" name="PBX_DEVISE"      value="978">
                    <input type="hidden" name="PBX_CMD"         value="<?php echo $pbx_cmd; ?>">
                    <input type="hidden" name="PBX_PORTEUR"     value="<?php echo $pbx_porteur; ?>">
                    <input type="hidden" name="PBX_RETOUR"      value="<?php echo $pbx_retour; ?>">
                    <input type="hidden" name="PBX_EFFECTUE"    value="<?php echo $pbx_effectue; ?>">
                    <input type="hidden" name="PBX_ANNULE"      value="<?php echo $pbx_annule; ?>">
                    <input type="hidden" name="PBX_REFUSE"      value="<?php echo $pbx_refuse; ?>">
                    <input type="hidden" name="PBX_HASH"        value="SHA512">
                    <input type="hidden" name="PBX_TIME"        value="<?php echo $dateTime; ?>">
                    <input type="hidden" name="PBX_HMAC"        value="<?php echo $hmac; ?>">

                    <button type="submit" class="btn btn-success btn-lg w-100">
                         Payer maintenant
                    </button>
                </form>

            </div>
        </div>
    </div>
</div>