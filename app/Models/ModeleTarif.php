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
            return $this->from('tarifer t')
                ->select('t.TARIF, t.NOPERIODE, t.NOTYPE, t.LETTRECATEGORIE')
                ->where('t.NOLIAISON', $noliaison)
                ->get()
                ->getResult();
        }
    }
?>