<?php
    namespace App\Controllers;
    helper(['url', 'assets', 'form']);
    use App\Models\modeleLiaisons;
    class clients extends BaseController
    {
        public function liaisonssecteur($referenceLiaisons = null)
        {
            $modLiaisons = new modeleLiaisons(); 
            $data['lesliaisons'] = $modLiaisons->find($referenceLiaisons);
            $data['TitreDeLaPage'] = 'Toutes les liaisons';
                return view('Templates/Header')
                    . view('clients/vue_liaisonssecteur', $data)
                    . view('Templates/Footer');
        }
    }
?>