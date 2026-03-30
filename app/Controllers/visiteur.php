<?php
namespace App\Controllers;
helper(['assets']); // donne accès aux fonctions du helper 'asset'
class visiteur extends BaseController
{
    public function acceuil()
    {
        return view('utilisateur/vue_acceuil')
        . view ('Templates/header');
    }
    } // Fin voirLesProduits