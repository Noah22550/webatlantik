<?php
    namespace App\Models;
    use CodeIgniter\Model;
    class modeleReserv extends Model
    {
        protected $table = 'reservation r';
        /* ci-dessus on indique la table a 'mapper' */
        protected$primaryKey = 'NORESERVATION'; // clé primaire
        protected $useAutoIncrement = true;
        protected $returnType = 'object'; // résultats retournés sous forme d'objet(s)
        protected $allowedFields = ['NOTRAVERSEE', 'NOCLIENT', 'DATEHEURE', 'MONTANTTOTAL','PAYE','MODEREGLEMENT'];
        
        public function getreservation($noclient)
        {
            return $this->select('r.NORESERVATION, r.DATEHEURE, r.MONTANTTOTAL, r.PAYE, t.DATEHEUREDEPART, pd.NOM as portdepart, pa.NOM as portarrivee')
                ->join('traversee t', 't.NOTRAVERSEE = r.NOTRAVERSEE', 'inner')
                ->join('liaison l', 'l.NOLIAISON = t.NOLIAISON', 'inner')
                ->join('port pd', 'pd.NOPORT = l.NOPORT_DEPART', 'inner')
                ->join('port pa', 'pa.NOPORT = l.NOPORT_ARRIVEE', 'inner')
                ->where('r.NOCLIENT', $noclient)
                ->orderBy('r.DATEHEURE', 'DESC')
                ->paginate(3);
        }
    }
?>