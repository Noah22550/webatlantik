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
        
        /*
        public function getTarif($noliaison)
        {
            return $this->select('l.NOLIAISON AS codeliaison, portd.NOM AS portdépart, porta.NOM AS portarrivé ,c.LETTRECATEGORIE AS lettretype,  
                                c.libelle AS types , ty.LETTRECATEGORIE AS lettrecatégorie, 
                                ty.libelle AS catégorie, p.DATEDEBUT, p.DATEFIN, tarif')
                                //alias = codeliaison, portdépart, portarrivé ,lettretype, types , lettrecatégorie, catégorie, DATEDEBUT, DATEFIN, tarif
                    ->join('categorie c', 'c.LETTRECATEGORIE = t.LETTRECATEGORIE')
                    ->join('type ty', 'ty.NOTYPE = t.NOTYPE')
                    ->join('liaison l', 'l.NOLIAISON = t.NOLIAISON')
                    ->join('port porta', 'porta.NOPORT = l.NOPORT_ARRIVEE')
                    ->join('port portd', 'portd.NOPORT = l.NOPORT_DEPART')
                    ->join('periode p', 'p.NOPERIODE = t.NOPERIODE')
                    -> where('l.NOLIAISON', $noliaison)
                    ->get()
                    ->getResult();
        } 
        */
        public function getcategorie()
        {
            return $this->select('c.LETTRECATEGORIE, c.libelle')
                    ->from('categorie c')
                    ->groupby('c.LETTRECATEGORIE, c.libelle')
                    ->get()
                    ->getResult();
        }
        public function getype(){
            return $this->select('ty.NOTYPE, ty.libelle')
                    ->from('type ty')
                    ->groupby('ty.NOTYPE, ty.libelle')
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
            return $this->select('tar.TARIF, ty.LETTRECATEGORIE')
                    ->from('tarifer tar')
                    ->join('liaison l', 'l.NOLIAISON = tar.NOLIAISON')
                    ->join('type ty ', 'ty.NOTYPE = tar.NOTYPE')
                    ->join('categorie c', 'c.LETTRECATEGORIE = ty.LETTRECATEGORIE')
                    ->join('periode p', 'p.NOPERIODE = tar.NOPERIODE')
                    ->where('l.NOLIAISON', $noliaison)
                    ->get()
                    ->getResult();
        }
    }
?>