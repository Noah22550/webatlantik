<?php
    namespace App\Controllers;
    helper(['url', 'assets', 'form']);
    use App\Models\ModeleLiaisons;
    use App\Models\ModeleTarif;
    use App\Models\ModeleClients;
    use PhpParser\Node\Expr\AssignOp\Mod;

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
        $modeletarif = new modeleTarif();

            $data['noliaison']  = $noliaison;
            $data['categories'] = $modeletarif->getcategorie();
            $data['types']      = $modeletarif->getype();
            $data['periodes']   = $modeletarif->getperiode();
            $data['tarifs']     = $modeletarif->getAllTarifs($noliaison);
            $data['nomsports']  = $modeletarif->getnomport($noliaison);
            $data['TitreDeLaPage'] = 'Tarifs de la liaison ' . $noliaison;
            return view('Templates/Header', $data)
                . view('clients/vue_liaisontarif', $data)
                . view('Templates/Footer');
        }





        
        public function modifcompte()
        {
            $session = session();
            $data['TitreDeLaPage'] = 'Modifier mon compte';
            $modelclient = new ModeleClients();

            if (!$this->request->is('post')) {
               // $data['client'] = $modelclient->getclient($this->session->get('noclient'));

                return view('Templates/Header')
                    . view('clients/vue_modifiercompte', $data)
                    . view('Templates/Footer');
            }

            $reglesValidation = [
                'txtnom' => 'string|max_length[30]',
                'txtprenom' => 'required|string|max_length[30]',
                'txtadresse' => 'required|string|max_length[100]',
                'txtcodepostal' => 'required|numeric',
                'txtville' => 'required|string|max_length[50]',
                'txttelephonefixe' => 'required|numeric|max_length[15]',
                'txttelephonemobile' => 'numeric|max_length[15]',
                'txtmel' => 'required|valid_email',
                'txtmotdepasse' => 'required|string|min_length[5]',
            ];
            if (!$this->validate($reglesValidation)) {
                $data['TitreDeLaPage'] = "Saisie client incorrecte";
                //$data['client'] = $modelclient->getclient($this->session->get('noclient'));
                return view('Templates/Header')
                    . view('clients/vue_modifiercompte', $data)
                    . view('Templates/Footer');
            }
            $donneesAInserer = [
                'nom' => $this->request->getPost('txtnom'),
                'prenom' => $this->request->getPost('txtprenom'),
                'adresse' => $this->request->getPost('txtadresse'),
                'codepostal' => $this->request->getPost('txtcodepostal'),
                'ville' => $this->request->getPost('txtville'),
                'mel' => $this->request->getPost('txtmel'),
                'telephonefixe' => $this->request->getPost('txttelephonefixe'),
                'telephonemobile' => $this->request->getPost('txttelephonemobile'),
                'motdepasse' => $this->request->getPost('txtmotdepasse'),
            ];
            //$modelclient->update($this->session->get('noclient'), $donneesAInserer);
            $donnees['clientAjoute'] = true;
            return view('Templates/Header')
                . view('utilisateur/vue_RapportAjout', $donnees)
                . view('Templates/Footer');
        }
        public function affichertraverse()
        {
            $data['TitreDeLaPage'] = 'Horaires des traversées';
            return view('Templates/Header')
                . view('clients/vue_traverse', $data)
                . view('Templates/Footer');
        }
    }
?>