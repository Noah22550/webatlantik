<?php
    namespace App\Controllers;
    helper(['url', 'assets', 'form']);
    use App\Models\ModeleLiaisons;
    use App\Models\ModeleTarif;
    use App\Models\ModeleClients;
    use App\Models\ModeleHoraire;
    use App\Models\modelecategorie;
    use App\Models\modeleReserv;
    use App\Models\ModeleEnregistrer;

    class clients extends BaseController
    {
    
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
            'nom'=> $this->request->getPost('txtNom'),
            'prenom' => $this->request->getPost('txtPrenom'),
            'adresse'=> $this->request->getPost('txtAdresse'),
            'codepostal'  => $this->request->getPost('txtCodepostal'),
            'ville'  => $this->request->getPost('txtVille'),
            'telephonefixe' => $this->request->getPost('txtTelfixe'),
            'telephonemobile'=> $this->request->getPost('txtTelportable'),
            'mel'=> $this->request->getPost('txtMel'),
            'motdepasse'=> $this->request->getPost('txtMotDePasse'),
        ); 
        $modClient = new ModeleClients();
       $data["modif"] = $modClient->update($session->get('noclient'), $donneesAModifier);
        return view('Templates/Header')
            .view('clients/vue_RapportModif', $data)
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
        public function reserve($notraversee)
        {
                $session = session();
                date_default_timezone_set('Europe/Paris');
                $modeTarif = new ModeleTarif();
                $modeclient = new ModeleClients();
                $modeliaisons = new ModeleLiaisons();
                $moderesa = new modeleReserv();
                $modEnr = new ModeleEnregistrer();
                $data['notraversee'] = $notraversee;
                $data['client'] = $modeclient->findall();
                $noliaison = $_SESSION['noliaison'];
                $datedepart = $_SESSION['dateDepart'];
                $session->set('notraversee', $notraversee);
                $data['entete'] = $modeliaisons->getenteteprtarif($notraversee);
                $data['libelle'] = $modeTarif->getTarif($noliaison, $datedepart);
                if (isset($_POST['bouton'])) {
                    $total = 0;
                    foreach ($this->request->getPost('libelle') as $ligne) {
                        if ($ligne['qte'] != "") {
                            $tarif = (float) $ligne['tarif'];
                            $qte   = (float) $ligne['qte'];
                            $total += $tarif * $qte;
                        }
                    }
                    $donneesAInserer = [
                        'NOTRAVERSEE'=> (int) $notraversee,
                        'NOCLIENT' => (int) $session->get('noclient'),
                        'DATEHEURE' => date('Y-m-d H:i:s'),
                        'MONTANTTOTAL'=> (float) $total,
                        'PAYE'=> 0,
                        'MODEREGLEMENT'=> null,
                    ];
                    $moderesa->insert($donneesAInserer, false);
                    $noreservation = $moderesa->getInsertID(); 
                    foreach ($this->request->getPost('libelle') as $ligne) {
                        if ($ligne['qte'] != "") { 
                            $donneesEnr = [
                                'NORESERVATION' => (int) $noreservation,
                                'LETTRECATEGORIE' => $ligne['lettrecategorie'],
                                'NOTYPE'  => (int) $ligne['notype'],
                                'QUANTITERESERVEE'  => (int) $ligne['qte'],
                                'QUANTITEEMBARQUEE' => 0,
                            ];
                            $modEnr->insert($donneesEnr, false);
                        }
                    }
                    $session->set('noreservation', $noreservation);
                    $session->set('montanttotal', $total);
                    $session->set('lignes', $this->request->getPost('libelle'));
                    $data['lignes']  = $modEnr->getLignesReservation($noreservation);
                    $data['noreservation'] = $noreservation;
                    $data['montanttotal'] = $total;
                    $data['client']  = $modeclient->find($session->get('noclient'));
                    $data['TitreDeLaPage'] = 'Votre réservation';

                    return view('Templates/Header', $data)
                        . view('clients/vue_traitementPanier', $data)
                        . view('Templates/Footer');
                }
                return view('Templates/Header', $data)
                    . view('clients/vue_reserve', $data)
                    . view('Templates/Footer');
        }
        public function voirresa()
        {
        $session = session();
        $modeleReserv = new modeleReserv();

        $data['TitreDeLaPage'] = 'Mes réservations';
        $data['reservations']  = $modeleReserv->getreservation($session->get('noclient'));
        $data['pager']         = $modeleReserv->pager; // ← minuscule, APRÈS getreservation()

        return view('Templates/Header', $data)
            . view('clients/vue_voirresa', $data)
            . view('Templates/Footer');
        }
        
    }
?>