<?php
namespace App\Controllers;
helper(['url', 'assets', 'form']);
use App\Models\ModeleClients;
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
    public function seconnecter()
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
            'txtIdentifiant' => 'required',
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
        $Identifiant = $this->request->getPost('txtIdentifiant');
        $MdP = $this->request->getPost('txtMotDePasse');
        /* on va chercher dans la BDD l'utilisateur correspondant aux id et mot de passe saisis */
        $modUtilisateur = new ModeleClients();
        $condition = ['mel'=>$Identifiant,'motdepasse'=>$MdP];
        $utilisateurRetourne = $modUtilisateur->where($condition)->first();
        if ($utilisateurRetourne != null) {
            /* identifiant et mot de passe OK : identifiant et profil sont stockés en session */
            $session->set('mel', $utilisateurRetourne->mel);
            $session->set('profil', $utilisateurRetourne->profil);
            // profil = "SuperAdministrateur ou "Administrateur"
            $data['mel'] = $Identifiant;
            echo view('Templates/Header', $data);
            echo view('utilisateur/vue_ConnexionReussie');
        } else {
            /* identifiant et/ou mot de passe OK : on renvoie le formulaire  */
            $data['TitreDeLaPage'] = "Identifiant ou/et Mot de passe inconnu(s)";
            return view('Templates/Header', $data)
            . view('utilisateur/vue_SeConnecter')
            . view('Templates/Footer');
        }
    }
    public function sedeconnecter()
    {
        $session = session();
        $session->destroy(); // destruction de la session : plus d'identifiant ni de profil en session
        return redirect()->to(site_url('acceuil')); // redirection vers la page d'accueil
    }
}