<?php
    namespace App\Models;
    use CodeIgniter\Model;
    class modeleTarif extends Model
    {
        protected $table = 'tarifer t ';
        /* ci-dessus on indique la table a 'mapper' */
        protected$primaryKey = 'noperiode'; // clé primaire
        protected $useAutoIncrement = false;
        protected $returnType = 'object'; // résultats retournés sous forme d'objet(s)
        protected $allowedFields = ['NOPERIODE', 'LETTRECATEGORIE', 'NOTYPE','NOLIAISON','TARIF'];
        public function getcategorie()
        {
            return $this->select('c.LETTRECATEGORIE, c.libelle')
                    ->from('categorie c')
                    ->groupby('c.LETTRECATEGORIE, c.libelle')
                    ->get()
                    ->getResult();
        }
        public function getype() {
            return $this->select('ty.NOTYPE, ty.LETTRECATEGORIE, ty.libelle')
                    ->from('type ty')
                    ->groupby('ty.NOTYPE, ty.LETTRECATEGORIE, ty.libelle')
                    ->get()
                    ->getResult();
        }
        public function getperiode(){
            return $this->select('p.NOPERIODE, p.DATEDEBUT, p.DATEFIN')
                ->from('periode p')
                    ->groupby('p.NOPERIODE, p.DATEDEBUT, p.DATEFIN')
                    //-> where('p.NOPERIODE', $noperiode)
                    ->get()
                    ->getResult();
        }
        public function getAllTarifs($noliaison)
        {
            return $this->select('TARIF, NOPERIODE, NOTYPE, LETTRECATEGORIE')
                ->where('NOLIAISON', $noliaison)
                ->get()
                ->getResult();
        }
        public function getnomport($noliaison)
        {
            return $this->select('p.NOM as depart, po.NOM as arrivee')
                ->from('liaison l')
                ->join('port p', 'p.NOPORT = l.NOPORT_DEPART')
                ->join('port po', 'po.NOPORT = l.NOPORT_ARRIVEE')
                ->where('l.NOLIAISON', $noliaison)
                ->get()
                ->getResult();
        }
        public function getTarif($noliaison, $datedepart)
        {
        return $this->select('typ.NOTYPE, typ.LIBELLE as libcat, typ.LETTRECATEGORIE as lettre, tarifer.TARIF')
        ->from('tarifer tarifer')
        ->join('type typ', 'typ.NOTYPE = tarifer.NOTYPE AND typ.LETTRECATEGORIE = tarifer.LETTRECATEGORIE', 'inner')
        ->join('periode per', 'per.NOPERIODE = tarifer.NOPERIODE', 'inner')
        ->where('tarifer.NOLIAISON', $noliaison)
        ->where('per.DATEDEBUT <=', $datedepart)
        ->where('per.DATEFIN >=', $datedepart)
        ->groupby('typ.LETTRECATEGORIE, typ.LIBELLE')
        ->orderBy('typ.LETTRECATEGORIE, typ.NOTYPE')
        ->get()
        ->getResult();
        }
    }
?>