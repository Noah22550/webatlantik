<?php
    namespace App\Models;
    use CodeIgniter\Model;
    class modeleReserv extends Model
    {
        protected $table = 'reservation';
        /* ci-dessus on indique la table a 'mapper' */
        protected$primaryKey = 'NORESERVATION'; // clé primaire
        protected $useAutoIncrement = true;
        protected $returnType = 'object'; // résultats retournés sous forme d'objet(s)
        protected $allowedFields = ['NOTRAVERSEE', 'NOCLIENT', 'DATEHEURE', 'MONTANTTOTAL','PAYE','MODEREGLEMENT'];
        
    }
?>