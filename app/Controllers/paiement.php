<?php
namespace App\Controllers;

class Paiement extends BaseController
{
    public function index()
    {
        $session = session();

        // --- Identifiants PayBox (test) ---
        $pbx_site        = '1999888';
        $pbx_rang        = '32';
        $pbx_identifiant = '107904482';

        // --- Données commande ---
        $pbx_cmd     =  'cmd_rabelais_' . time(); // référence unique de la commande
        $pbx_porteur = 'test@test.fr'; // ← email fixe en test (session peut être vide)
        $pbx_total   = '100';          // ← 100 centimes = 1 euro
        $Montant = $session->get('montanttotal') * 100; // montant total de la commande en centimes
        $pbx_total =  $Montant;
        // --- URLs de retour ---
        $pbx_effectue = base_url('paiement/accepte');
        $pbx_annule   = base_url('paiement/annule');
        $pbx_refuse   = base_url('paiement/refuse');
        // $pbx_repondre_a : commenté car localhost non accessible par PayBox

        // --- Paramètres retour ---
        $pbx_retour = 'Montant:M;Reference:R;Auto:A;Erreur:E';

        // --- Clé secrète HMAC (test) ---
        $keyTest = '0123456789ABCDEF0123456789ABCDEF0123456789ABCDEF0123456789ABCDEF0123456789ABCDEF0123456789ABCDEF0123456789ABCDEF0123456789ABCDEF';

        // --- Serveur PayBox préproduction ---
        $serveurOK = 'https://preprod-tpeweb.paybox.com/cgi/MYchoix_pagepaiement.cgi';

        // --- Date ISO-8601 ---
        $dateTime = date("c");

        // --- Chaîne à hacher (SANS PBX_REPONDRE_A en local) ---
        $msg = "PBX_SITE="         . $pbx_site
             . "&PBX_RANG="        . $pbx_rang
             . "&PBX_IDENTIFIANT=" . $pbx_identifiant
             . "&PBX_TOTAL="       . $pbx_total
             . "&PBX_DEVISE=978"
             . "&PBX_CMD="         . $pbx_cmd
             . "&PBX_PORTEUR="     . $pbx_porteur
             . "&PBX_RETOUR="      . $pbx_retour
             . "&PBX_EFFECTUE="    . $pbx_effectue
             . "&PBX_ANNULE="      . $pbx_annule
             . "&PBX_REFUSE="      . $pbx_refuse
             . "&PBX_HASH=SHA512"
             . "&PBX_TIME="        . $dateTime;

        // --- Calcul HMAC ---
        $binKey = pack("H*", $keyTest);
        $hmac   = strtoupper(hash_hmac('sha512', $msg, $binKey));

        $data['serveurOK']       = $serveurOK;
        $data['pbx_site']        = $pbx_site;
        $data['pbx_rang']        = $pbx_rang;
        $data['pbx_identifiant'] = $pbx_identifiant;
        $data['pbx_total']       = $pbx_total;
        $data['pbx_cmd']         = $pbx_cmd;
        $data['pbx_porteur']     = $pbx_porteur;
        $data['pbx_retour']      = $pbx_retour;
        $data['pbx_effectue']    = $pbx_effectue;
        $data['pbx_annule']      = $pbx_annule;
        $data['pbx_refuse']      = $pbx_refuse;
        $data['dateTime']        = $dateTime;
        $data['hmac']            = $hmac;
        $data['TitreDeLaPage']   = 'Paiement en ligne';

        return view('Templates/Header', $data)
             . view('clients/vue_paiement', $data)
             . view('Templates/Footer');
    }

    public function accepte()
    {
        $montant = ($_GET['Montant'] ?? 0) / 100;
        $ref     = $_GET['Reference'] ?? '';
        $auto    = $_GET['Auto']      ?? '';

        $data['TitreDeLaPage'] = 'Paiement accepté';
        $data['montant']       = $montant;
        $data['reference']     = $ref;
        $data['auto']          = $auto;

        return view('Templates/Header', $data)
             . view('clients/vue_accepte', $data)
             . view('Templates/Footer');
    }

    public function annule()
    {
        $data['TitreDeLaPage'] = 'Paiement annulé';
        return view('Templates/Header', $data)
             . view('clients/vue_annule', $data)
             . view('Templates/Footer');
    }

    public function refuse()
    {
        $data['TitreDeLaPage'] = 'Paiement refusé';
        return view('Templates/Header', $data)
             . view('clients/vue_refuse', $data)
             . view('Templates/Footer');
    }

    public function retour()
    {
        $erreur    = $_GET['Erreur']    ?? '';
        $reference = $_GET['Reference'] ?? '';
        $montant   = $_GET['Montant']   ?? 0;

        if ($erreur == '00000') {
            $modeleReserv = new \App\Models\modeleReserv();
            $modeleReserv->where('NORESERVATION', $reference)
                         ->set(['PAYE' => 1, 'MONTANTTOTAL' => $montant / 100])
                         ->update();
        }
    }
}