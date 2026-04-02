<?php
    namespace App\Controllers;
    helper(['url', 'assets', 'form']);
    use App\Models\modeleLiaisons;
    use App\Models\ModeleTarif;
    class clients extends BaseController
    {
        public function liaisonssecteur()
        {
            $modLiaisons = new modeleLiaisons();

            $data['LesLiaisons'] = $modLiaisons->getliaisonsecteur();
            $data['TitreDeLaPage'] = 'Toutes les liaisons';

            return view('Templates/Header', $data)
                . view('clients/vue_liaisonssecteur', $data)
                . view('Templates/Footer');
        }
        public function liaisontarif($noliaison)
        {
            $modtarfis = new ModeleTarif();

            $data['lesTarifs'] = $modtarfis->getTarif($noliaison);
            $data['TitreDeLaPage'] = 'Tarifs de la liaison';

            return view('Templates/Header', $data)
                . view('clients/vue_liaisontarif', $data)
                . view('Templates/Footer');
        }
    }
?>