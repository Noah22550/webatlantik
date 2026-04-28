<?php
    namespace App\Controllers;
    helper(['url', 'assets', 'form']);
    use App\Models\ModeleLiaisons;
    use App\Models\ModeleTarif;
    use App\Models\ModeleClients;
    use App\Models\ModeleHoraire;
    use App\Models\modelecategorie;

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



        public function modifcompte($noclient)
        {
            //$session = session();
            $data['TitreDeLaPage'] = 'Modifier mon compte';
            $modelclient = new ModeleClients();
            $mel = $modelclient->find($noclient);
            //$session->set('mel', $utilisateurRetourne->MEL);

            if(!$mel) {
                throw new \CodeIgniter\Exceptions\PageNotFoundException('Client non trouvé');
            }
            if (!$this->request->is('post')) {
                
                return view('Templates/Header')
                    . view('clients/vue_modifiercompte', $data)
                    . view('Templates/Footer');
            }

            $reglesValidation = [
                'txtnom' => 'required|string|max_length[30]',
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
            $noclient = $donneesAInserer['noclient'] ;
            $modelclient->update($noclient, $donneesAInserer); 
            $donnees['clientAjoute'] = true;
            return view('Templates/Header')
                . view('utilisateur/vue_RapportModif', $donnees)
                . view('Templates/Footer');
        }
        public function affichertraverse()
        {
            $modSec = new ModeleHoraire();
            $data['nomsecteur'] = $modSec->findall();
            return view('Templates/Header')
                . view('clients/vue_affichertraverse', $data)
                . view('Templates/Footer');
        }
       public function traversetab($nosecteur)
        {
            $data['TitreDeLaPage'] = 'Horaires des traversées';
            $modSec = new ModeleHoraire();
            $modcate = new modelecategorie();
            $data['nomsecteur'] = $modSec->findall();
            $data['lescatégories'] = $modcate->findall();

            $modLiaisons = new ModeleLiaisons();
            $modperiode = new ModeleLiaisons();
            $data['uneliaison'] = $modLiaisons->getport($nosecteur);
            $data['lesperiodes'] = $modperiode->getperiode();
            $data['traversees'] = $modSec->getLesTraverseesBateaux();
            
            return view('Templates/Header')
                . view('clients/vue_traversetab', $data)
                . view('Templates/Footer');
        }
        
    }
?>