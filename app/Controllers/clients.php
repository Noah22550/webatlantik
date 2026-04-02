<?php
    namespace App\Controllers;
    helper(['url', 'assets', 'form']);
    use App\Models\modeleLiaisons;
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
        public function liaisontarif()
        {
            $modLiaisons = new modeleLiaisons();

            $data['LesLiaisons'] = $modLiaisons->getliaisonsecteur();
            $data['TitreDeLaPage'] = 'Toutes les liaisons avec tarifs';

            return view('Templates/Header', $data)
                . view('clients/vue_tarifliaison', $data)
                . view('Templates/Footer');
        }
    }
?>