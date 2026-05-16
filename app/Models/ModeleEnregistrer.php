<?php
namespace App\Models;
use CodeIgniter\Model;

class ModeleEnregistrer extends Model
{
    protected $table           = 'enregistrer';
    protected $returnType      = 'object';
    protected $allowedFields   = ['NORESERVATION', 'LETTRECATEGORIE', 'NOTYPE', 'QUANTITERESERVEE', 'QUANTITEEMBARQUEE'];
    
    public function getLignesReservation($noreservation)
    {
    return $this->select('enregistrer.QUANTITERESERVEE, type.LIBELLE')
        ->join('type', 'type.NOTYPE = enregistrer.NOTYPE AND type.LETTRECATEGORIE = enregistrer.LETTRECATEGORIE', 'inner')
        ->where('enregistrer.NORESERVATION', $noreservation)
        ->get()
        ->getResult();
    }
}