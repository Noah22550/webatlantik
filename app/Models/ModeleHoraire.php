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

         public function getQuantiteEnregistree($noTraversee, $lettreCategorie)
        {
            return $this->select('SUM(e.QUANTITERESERVEE) as quantite')
                ->from('reservation r')
                ->join('enregistrer e', 'r.NORESERVATION = e.NORESERVATION')
                ->where('r.NOTRAVERSEE', $noTraversee)
                ->where(' e.LETTRECATEGORIE', $lettreCategorie)
                ->get()
                ->getResult();
            }
        public function getLesTraverseesBateaux($noLiaison, $dateTraversee)
        {
            return $this->select('t.NOTRAVERSEE,TIME(t.DATEHEUREDEPART) AS HEURE, b.NOM')
                ->from('liaison l')
                ->join('traversee t', 'l.NOLIAISON = t.NOLIAISON')
                ->join('bateau b', 't.NOBATEAU = b.NOBATEAU')
                ->where('t.NOLIAISON', $noLiaison)
                ->where('DATE(t.DATEHEUREDEPART)', $dateTraversee)
                ->get()
                ->getResult();
        }
    }
   
?>