<?php
namespace App\Controllers;
helper(['assets', 'form']);
use App\Models\ModeleClients;
use App\Models\ModeleLiaisons;
use App\Models\ModeleTarif;
use App\Models\ModeleHoraire;
use App\Models\modelecategorie;
class visiteur extends BaseController
{
    public function acceuil()
    {
        return view('utilisateur/vue_acceuil')
        . view ('Templates/header')
        . view ('utilisateur/vue_caroussel');
    }
    public function inscription()
    {
        $data['TitreDeLaPage'] = 'inscription';
        /* TEST SI FORMULAIRE POSTE OU SI APPEL DIRECT (EN GET) */
        if (!$this->request->is('post')) {
            /* le formulaire n'a pas été posté, on retourne le formulaire */
            return view('Templates/Header')
            . view('utilisateur/vue_inscription', $data);
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
            /* formulaire non valid, on renvoie le formulaire */
            $data['TitreDeLaPage'] = "Saisie client incorrecte";
            return view('Templates/Header')
            . view('utilisateur/vue_inscription', $data)
            . view('Templates/Footer');
        }
        /* SI FORMULAIRE NON VALIDE, LE CODE QUI SUIT N'EST PAS EXECUTE */
        /* INSERTION PRODUIT SAISI DANS BDD */
        $donneesAInserer = array(
            //'reference' => $this->request->getPost('txtReference'),
            'nom' => $this->request->getPost('txtnom'),
            'prenom' => $this->request->getPost('txtprenom'),
            'adresse' => $this->request->getPost('txtadresse'),
            'codepostal' => $this->request->getPost('txtcodepostal'),
            'ville' => $this->request->getPost('txtville'),
            'mel' => $this->request->getPost('txtmel'),
            'telephonefixe' => $this->request->getPost('txttelephonefixe'),
            'telephonemobile' => $this->request->getPost('txttelephonemobile'),
            'motdepasse' => $this->request->getPost('txtmotdepasse'),
        ); // reference, libelle, prixht, quantiteenstock, image : champs de la table 'produit'
        $modelclient = new ModeleClients(); //instanciation du modèle
        $donnees['clientAjoute'] = $modelclient->insert($donneesAInserer, false);
        // provoque insert into sur la table mappée (produit, ici), retourne 1 (true) si ajout OK
        return view('Templates/Header')
            .view('utilisateur/vue_RapportAjout', $donnees);
    }

   public function seConnecter()
    {
        helper(['form']);
        $session = session();
        $data['TitreDeLaPage'] = 'Se connecter';
        /* TEST SI FORMULAIRE POSTE OU SI APPEL DIRECT (EN GET) */
        if (!$this->request->is('post')) {
            return view('Templates/Header', $data) // Renvoi formulaire de connexion
            . view('utilisateur/vue_SeConnecter')
            . view('Templates/Footer');
        }
        /* SI FORMULAIRE NON POSTE, LE CODE QUI SUIT N'EST PAS EXECUTE */
        /* VALIDATION DU FORMULAIRE */
        $reglesValidation = [ // Régles de validation
            'txtmel' => 'required',
            'txtMotDePasse' => 'required',
        ];
        if (!$this->validate($reglesValidation)) {
            /* formulaire non validé */
            $data['TitreDeLaPage'] = "Saisie incorrecte";
            return view('Templates/Header', $data)
            . view('utilisateur/vue_SeConnecter') // Renvoi formulaire de connexion
            . view('Templates/Footer');
        }
        /* SI FORMULAIRE NON VALIDE, LE CODE QUI SUIT N'EST PAS EXECUTE */
        /* RECHERCHE UTILISATEUR DANS BDD */
        $mel = $this->request->getPost('txtmel');
        $MdP = $this->request->getPost('txtMotDePasse');
        /* on va chercher dans la BDD l'utilisateur correspondant aux id et mot de passe saisis */
        $modUtilisateur = new ModeleClients();
        $condition = ['mel'=>$mel,'motdepasse'=>$MdP];
        $utilisateurRetourne = $modUtilisateur->where($condition)->first();

        if ($utilisateurRetourne != null) {
            /* mel et mot de passe OK : mel et profil sont stockés en session */
            $session->set('mel', $utilisateurRetourne->MEL);
            $session->set('nom', $utilisateurRetourne->NOM);
            $session->set('noclient', $utilisateurRetourne->NOCLIENT);
            // profil = "SuperAdministrateur ou "Administrateur"
            $data['mel'] = $mel;
            echo view('Templates/Header', $data);
            echo view('utilisateur/vue_ConnexionReussie');
        } else {
            /* mel et/ou mot de passe OK : on renvoie le formulaire  */
            $data['TitreDeLaPage'] = "mel ou/et Mot de passe inconnu(s)";
            return view('Templates/Header', $data)
            . view('utilisateur/vue_SeConnecter')
            . view('Templates/Footer');
        }
    } // Fin seConnecter
     public function seDeconnecter()
    {
        session()->destroy();
        return redirect()->to('seconnecter');
    } // Fin seDeconnecte
    public function liaisonssecteur()
        {
            $modLiaisons = new modeleLiaisons();

            $data['LesLiaisons'] = $modLiaisons->getliaisonsecteur();
            $data['TitreDeLaPage'] = 'Toutes les liaisons';

            return view('Templates/Header', $data)
                . view('utilisateur/vue_liaisonssecteur', $data)
                . view('Templates/Footer');
        }
        public function liaisontarif($noliaison)
        {
        $modeletarif = new modeleTarif();

            $data['noliaison'] = $noliaison;
            $data['categories']= $modeletarif->getcategorie();
            $data['types'] = $modeletarif->getype();
            $data['periodes'] = $modeletarif->getperiode();
            $data['tarifs'] = $modeletarif->getAllTarifs($noliaison);
            $data['nomsports'] = $modeletarif->getnomport($noliaison);
            $data['TitreDeLaPage'] = 'Tarifs de la liaison ' . $noliaison;
            return view('Templates/Header', $data)
                . view('utilisateur/vue_liaisontarif', $data)
                . view('Templates/Footer');
        } 
         public function traversetab($nosecteur)
            {
                $data['TitreDeLaPage'] = 'Horaires des traversées';
                $modSec = new ModeleHoraire();
                $modcate  = new ModeleCategorie();
                $modLiaisons = new ModeleLiaisons();
                $data['nomsecteur'] = $modSec->findAll();
                $data['lescatégories'] = $modcate->findAll();
                $data['uneliaison'] = $modLiaisons->getport($nosecteur);
                $data['lesperiodes'] = $modLiaisons->getperiode();
                $data['traversees'] = $modSec->getLesTraverseesBateaux();
                $capamaxResultat = $modSec->getCapaciteMaximale();
                $enregistreeResultat = $modSec->getQuantiteEnregistree();
                $resultat = [];
                foreach ($data['traversees'] as $uneTraversee) {
                    foreach ($data['lescatégories'] as $categorie) {
                        $lettre = $categorie->LETTRECATEGORIE;
                        $capaMax = 0;
                        foreach ($capamaxResultat as $res) {
                            if ($res->LETTRECATEGORIE == $lettre
                                && $res->NOBATEAU == $uneTraversee->NOBATEAU) {
                                $capaMax = (int)$res->CAPACITEMAX;
                            }
                        }
                        $enregistree = 0;
                        foreach ($enregistreeResultat as $res2) {
                            if ($res2->LETTRECATEGORIE == $lettre
                                && $res2->NOTRAVERSEE == $uneTraversee->Numero) {
                                $enregistree = (int)$res2->quantite;
                            }
                        }
                        $resultat[] = (object)[
                            'NOTRAVERSEE' => $uneTraversee->Numero,
                            'LETTRECATEGORIE' => $lettre,
                            'quantite'=> $capaMax - $enregistree,
                        ];
                    }
                }
                $data['resultat'] = $resultat;
                return view('Templates/Header')
                    . view('utilisateur/vue_traversetab', $data)
                    . view('Templates/Footer');
            }
}