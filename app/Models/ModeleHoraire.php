<?php
    namespace App\Models;
    use CodeIgniter\Model;
    class ModeleHoraire extends Model
    {
        protected $table = 'secteur';
        /* ci-dessus on indique la table a 'mapper' */
        protected$primaryKey = 'NOSECTEUR'; // clé primaire
        protected $useAutoIncrement = true;
        protected $returnType = 'object'; // résultats retournés sous forme d'objet(s)
        protected $allowedFields = ['NOM']; 

         public function getQuantiteEnregistree()
        {
            return $this->select('SUM(e.QUANTITERESERVEE) as quantite')
                ->from('reservation r')
                ->join('enregistrer e', 'r.NORESERVATION = e.NORESERVATION')
                //->where('r.NOTRAVERSEE', $noTraversee)
                //->where(' e.LETTRECATEGORIE', $lettreCategorie)
                ->get()
                ->getResult();
            }
                
           public function getCapaciteMaximale(){
                return $this->select('DISTINCT(c.CAPACITEMAX)')
                    ->from('traversee t')
                    -> join('bateau b', 'b.NOBATEAU = t.NOBATEAU', 'inner')
                    -> join('contenir c', 'c.NOBATEAU = b.NOBATEAU', 'inner')
                    -> groupby('c.CAPACITEMAX')
                    //->where('t.NOTRAVERSEE', $noTraversee)
                    //->where('c.LETTRECATEGORIE', $lettreCategorie)
                    ->get()
                    ->getResult();
            }
        
        public function getLesTraverseesBateaux()
        {
            return $this->select('NOLIAISON, t.NOTRAVERSEE as Numero, TIME(DATEHEUREDEPART) As heure, b.NOM')
                ->from('traversee t')
                ->join('bateau b', 'b.NOBATEAU = t.NOBATEAU', 'inner')
                ->groupby('t.NOTRAVERSEE')
                ->get()
                ->getResult();
        }
        
    }
   
?>