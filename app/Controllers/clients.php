<?php
    namespace App\Controllers;
    helper(['url', 'assets', 'form']);
    use App\Models\modeleLiaisons;
    class clients extends BaseController
    {
        public function liaisonssecteur($referenceLiaisons = null, $nosecteur = null)
        {
            $modLiaisons = new modeleLiaisons(); 
            if ($referenceLiaisons === null){
                $data['LesLiaisons'] = $modLiaisons->findAll();
                $data['TitreDeLaPage'] = 'Toutes les liaisons';

                return view('Templates/Header')
                    . view('clients/vue_liaisonssecteur', $data)
                    . view('Templates/Footer');
            } else
            {
                $data['uneLiaison'] = $modLiaisons->find($referenceLiaisons);
            }          
            $modLiaisons = new modeleLiaisons();

            $lesLiaisons = $modLiaisons->getAllRegionLiaison($nosecteur);
            $data['lesLiaisons'] = $lesLiaisons;
            $data['noRegion'] = $nosecteur;
            $data['TitreDeLaPage'] = "Liaisons des secteurs";

            return view('Templates/Header')
                . view('clients/vue_liaisonssecteur', $data)
                . view('Templates/Footer');

        }
    }
?>