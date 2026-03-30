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
        /* SI FORMULAIRE NON POSTE, LE CODE QUI SUIT N'EST PAS EXECUTE */
        /* VALIDATION DU FORMULAIRE */
        $reglesValidation = [
            'txtnom' => 'string|max_length[30]',
            'txtprenom' => 'required|string|max_length[30]',
            'txtadresse' => 'required|string|max_length[100]',
            'txtcodepostal' => 'required|numeric',
            'txtville' => 'required|string|max_length[50]',
            'txttelephonefixe' => 'required|numeric|max_length[15]',
            'txttelephonemobile' => 'numeric|max_length[15]',
            'txtmel' => 'required|valid_email',
            'txtmotdepasse' => 'required|string|min_length[2]',
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
}