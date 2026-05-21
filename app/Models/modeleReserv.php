<?php
namespace App\Models;
use CodeIgniter\Model;

class modeleReserv extends Model
{
    protected $table            = 'reservation'; // ← sans alias
    protected $primaryKey       = 'NORESERVATION';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $allowedFields    = ['NOTRAVERSEE', 'NOCLIENT', 'DATEHEURE', 'MONTANTTOTAL', 'PAYE', 'MODEREGLEMENT'];

    public function getreservation($noclient)
    {
        return $this->distinct()
        ->select('r.NORESERVATION, r.DATEHEURE, r.MONTANTTOTAL, r.PAYE,t.DATEHEUREDEPART,pd.NOM as portdepart,pa.NOM as portarrivee')
            ->from('reservation r')
            ->join('traversee t', 't.NOTRAVERSEE = r.NOTRAVERSEE', 'inner')
            ->join('liaison l', 'l.NOLIAISON = t.NOLIAISON', 'inner')
            ->join('port pd', 'pd.NOPORT = l.NOPORT_DEPART', 'inner')
            ->join('port pa', 'pa.NOPORT = l.NOPORT_ARRIVEE', 'inner')
            ->where('r.NOCLIENT', $noclient)
            ->orderBy('r.DATEHEURE', 'DESC')
            ->paginate(4); 
    }
    public function getreservationById($noreservation)
    {
       return $this->db->table('enregistrer e')
        ->select('e.LETTRECATEGORIE,
                  e.NOTYPE,
                  e.QUANTITERESERVEE,
                  e.QUANTITEEMBARQUEE,
                  t.LIBELLE as libelletarif')
        ->join('type t', 't.LETTRECATEGORIE = e.LETTRECATEGORIE 
                      AND t.NOTYPE = e.NOTYPE', 'inner') // ← type pas tarif
        ->where('e.NORESERVATION', $noreservation)
        ->get()
        ->getResult();
    }
}