<?php
namespace App\Controllers;

use App\Models\ModeleClients;
use App\Models\modeleReserv;
use App\Models\ModeleEnregistrer;
use Dompdf\Dompdf;
use Dompdf\Options;

class PdfController extends BaseController
{
    public function generateReservationPdf($noreservation)
    {
        $session  = session();
        $modeleReserv = new modeleReserv();
        $modeleClient = new ModeleClients();
        $modEnr  = new ModeleEnregistrer();

        // Récupération des données
        $client = $modeleClient->find($session->get('noclient'));
        $reservation = $modeleReserv->getreservationById($noreservation);
        $lignes = $modEnr->getLignesReservation2($noreservation);

        $options = new Options();
        $options->set('isRemoteEnabled', true);
        $dompdf = new Dompdf($options);

        $html = view('clients/pdf_reservation', [
            'client' => $client,
            'reservation' => $reservation,
            'lignes'=> $lignes,
        ]);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        $filename = 'reservation_' . $noreservation . '_' . date('YmdHis') . '.pdf';
        $dompdf->stream($filename, ['Attachment' => false]); // false = affiche dans le navigateur
    }
}