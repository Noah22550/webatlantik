<?php
namespace App\Models;
use CodeIgniter\Model;

class ModeleEnregistrer extends Model
{
    protected $table = 'enregistrer';
    protected $returnType = 'object';
    protected $allowedFields = ['NORESERVATION', 'LETTRECATEGORIE', 'NOTYPE', 'QUANTITERESERVEE', 'QUANTITEEMBARQUEE'];
    
    public function getLignesReservation($noreservation)
    {
    return $this->select('enregistrer.QUANTITERESERVEE, type.LIBELLE')
        ->join('type', 'type.NOTYPE = enregistrer.NOTYPE AND type.LETTRECATEGORIE = enregistrer.LETTRECATEGORIE', 'inner')
        ->where('enregistrer.NORESERVATION', $noreservation)
        ->get()
        ->getResult();
    }

     public function getLignesReservation2($noreservation)
        {
            return $this->db->table('enregistrer e')
                ->select('e.LETTRECATEGORIE,
                        e.NOTYPE,
                        e.QUANTITERESERVEE,
                        e.QUANTITEEMBARQUEE,
                        t.LIBELLE as libelletarif')
                ->join('type t', 't.LETTRECATEGORIE = e.LETTRECATEGORIE 
                            AND t.NOTYPE = e.NOTYPE', 'inner')
                ->where('e.NORESERVATION', $noreservation)
                ->get()
                ->getResult(); // ← retourne un tableau d'objets
        }
}