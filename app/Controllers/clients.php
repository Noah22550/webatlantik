<?php
    namespace App\Controllers;
    helper(['url', 'assets', 'form']);
    use App\Models\ModeleLiaisons;
    use App\Models\ModeleTarif;
    use App\Models\ModeleClients;
    use App\Models\ModeleHoraire;
    use App\Models\modelecategorie;
    use App\Models\modeleReserv;

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
        $data['TitreDeLaPage'] = 'Modifer vos informations';
        if (!$this->request->is('post')) {
            return view('Templates/Header')
            . view('Clients/vue_modifiercompte', $data)
            . view('Templates/Footer');
        }
        $reglesValidation = [
            'txtNom' => 'permit_empty|string|max_length[60]',
            'txtPrenom' => 'permit_empty|string|max_length[60]',
            'txtAdresse' => 'permit_empty|string|max_length[128]',
            'txtCodepostal' => 'permit_empty|integer|max_length[11]',
            'txtVille' => 'permit_empty|string|max_length[80]',
            'txtTelfixe' => 'permit_empty|string|max_length[16]',
            'txtTelportable' => 'permit_empty|string|max_length[16]',
            'txtMel' => 'permit_empty|string|max_length[80]',
            'txtMotDePasse' => 'permit_empty|string|min_length[2]',
        ];
        if (!$this->validate($reglesValidation)) {

            $data['TitreDeLaPage'] = "Saisie incorrecte";
            return view('Templates/Header')
            . view('Clients/vue_modifiercompte', $data)
            . view('Templates/Footer');
        }

        $donneesAModifier = array(
            'NOM' => $this->request->getPost('txtNom'),
            'PRENOM' => $this->request->getPost('txtPrenom'),
            'ADRESSE' => $this->request->getPost('txtAdresse'),
            'CODEPOSTAL' => $this->request->getPost('txtCodepostal'),
            'VILLE' => $this->request->getPost('txtVille'),
            'TELEPHONEFIXE' => $this->request->getPost('txtTelfixe'),
            'TELEPHONEMOBILE' => $this->request->getPost('txtTelportable'),
            'MEL' => $this->request->getPost('txtMel'),
            'MOTDEPASSE' => $this->request->getPost('txtMotDePasse'),
        ); 
        $modClient = new ModeleClients();
        $condition = ['NOCLIENT'=>$session->get('noclient')];
        $donnees['clientAModifier'] = $modClient->where('NOCLIENT', $condition)->update($condition,$donneesAModifier, false);

        return view('Templates/Header')
            .view('utilisateur/vue_RapportAjout', $donnees)
            .view('Templates/Footer');
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
            $data['uneliaison']  = $modLiaisons->getport($nosecteur);
            $data['lesperiodes'] = $modperiode->getperiode();
            $data['traversees']  = $modSec->getLesTraverseesBateaux();
            $data['resultat'] = [];
            foreach ($data['lescatégories'] as $categorie) {
                foreach ($data['traversees'] as $uneTraversee) {
                    $capamaxResult = $modSec->getCapaciteMaximale();
                    $enregistreeResult = $modSec->getQuantiteEnregistree();
                    // Chercher la bonne ligne dans les résultats
                    $capamax = 0;
                    foreach ($capamaxResult as $res) {
                        if ($res->LETTRECATEGORIE == $categorie->LETTRECATEGORIE && $res->NOBATEAU == $uneTraversee->NOBATEAU) {
                            $capamax = (int)$res->CAPACITEMAX;
                            break;
                        }
                    }
                        $enregistree = 0;
                        foreach ($enregistreeResult as $res2) {
                            if ($res2->LETTRECATEGORIE == $categorie->LETTRECATEGORIE && $res2->NOTRAVERSEE == $uneTraversee->Numero) {
                                $enregistree = (int)$res2->quantite;
                                break;
                            }
                        }
                        $data['resultat'][] = (object)[
                            'LETTRECATEGORIE' => $categorie->LETTRECATEGORIE,
                            'NOTRAVERSEE'=> $uneTraversee->Numero,
                            'NOLIAISON'=> $uneTraversee->NOLIAISON,
                            'quantite' => $capamax - $enregistree,
                        ];
                    }
                }
            return view('Templates/Header')
                . view('clients/vue_traversetab', $data)
                . view('Templates/Footer');
        }
        public function reserve($notraversee)
        {
                $session = session();
                $modeTarif = new ModeleTarif();
                $modeclient = new ModeleClients();
                $modeliaisons = new ModeleLiaisons();
                $moderesa = new modeleReserv();
                $data['notraversee'] = $notraversee;
                $data['client'] = $modeclient->findall();
                $noliaison = $_SESSION['noliaison'];
                $datedepart = $_SESSION['dateDepart'];
                $session->set('notraversee', $notraversee);
                $data['entete'] = $modeliaisons->getenteteprtarif($notraversee);
                $data['libelle'] = $modeTarif->getTarif($noliaison, $datedepart);
               if ($this->request->is('post')) {
                $total = 0;
                foreach ($this->request->getPost('libelle') as $ligne) {
                        $tarif = (float)$ligne['tarif'];
                        $qte   = (int)$ligne['qte'];
                        $total += $tarif * $qte;
                }
                $donneesAInserer = array(
                'NOTRAVERSEE'=> $session->get('notraversee'),
                'NOCLIENT'=> $session->get('noclient'),
                'DATEHEURE'=> date('Y-m-d H:i:s'),
                'MONTANTTOTAL'=> $total,
                'PAYE' => 0,
                'MODEREGLEMENT' => null,
                ); 
                $moderesa->insert($donneesAInserer, false);
                }
                return view('Templates/Header', $data)
                    . view('clients/vue_reserve', $data)
                    . view('Templates/Footer');
        }
        public function traitementPanier()
        {
            $data['TitreDeLaPage'] = 'Horaires des traversées';
             return view('Templates/Header', $data)
                    . view('clients/vue_traitementPanier', $data)
                    . view('Templates/Footer');
        }
    }
?>