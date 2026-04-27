<?php
    namespace App\Models;
    use CodeIgniter\Model;
    class ModeleLiaisons extends Model
    {
        protected $table = 'liaison';
        /* ci-dessus on indique la table a 'mapper' */
        protected$primaryKey = 'NOLIAISON'; // clé primaire
        protected $useAutoIncrement = true;
        protected $returnType = 'object'; // résultats retournés sous forme d'objet(s)
        protected $allowedFields = ['noport_depart', 'nosecteur','noport_arrivee', 'distance'];
    
       public function getentete($numliaison, $portarrive, $portdepart){
            return $this->select("l.NOLIAISON AS codeliaison, portd.NOM AS portdépart, porta.NOM AS portarrivé")
                    ->from('liaison l')
                    ->join('port porta', 'porta.NOPORT = l.NOPORT_ARRIVEE')
                    ->join('port portd', 'portd.NOPORT = l.NOPORT_DEPART')
                    ->where('l.NOLIAISON', $numliaison)
                    ->get()
                    ->getResult();
        }
        public function getliaisonsecteur()
        {
            return $this->select('secteur.nom AS nomsecteur , port_depart.NOM AS portdepart , port_arrivee.NOM AS portarrivee , liaison.NOLIAISON, liaison.DISTANCE')
                    ->join('port as port_depart', 'port_depart.noport = liaison.noport_depart')
                    ->join('port as port_arrivee', 'port_arrivee.noport = liaison.noport_arrivee')
                    ->join('secteur', 'secteur.nosecteur = liaison.nosecteur')
                    ->get()
                    ->getResult();
        }
        public function getport($noliaison){
            return $this->select('p.NOM as portdepart, po.NOM as portarrivee')
                ->from('liaison l')
                ->join('port p', 'p.NOPORT = l.NOPORT_DEPART')
                ->join('port po', 'po.NOPORT = l.NOPORT_ARRIVEE')
                ->join('secteur s', 's.NOSECTEUR = l.NOSECTEUR')
                ->groupby('p.NOM, po.NOM')
                ->where('l.NOLIAISON', $noliaison)
                ->get()
                ->getResult();
        }
        public function getperiode($noliaison){
            return $this->select('date(DATEHEUREDEPART) as dates')
                ->from('traversee t ')
                ->where('t.NOLIAISON', $noliaison)
                ->groupby('dates')
                ->get()
                ->getResult();
        }


    }
?>