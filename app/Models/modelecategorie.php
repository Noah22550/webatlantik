<?php
    namespace App\Models;
    use CodeIgniter\Model;
    class modelecategorie extends Model
    {
        protected $table = 'categorie';
        /* ci-dessus on indique la table a 'mapper' */
        protected$primaryKey = 'LETTRECATEGORIE'; // clé primaire
        protected $useAutoIncrement = false;
        protected $returnType = 'object'; // résultats retournés sous forme d'objet(s)
        protected $allowedFields = ['LETTRECATEGORIE', 'LIBELLE'];
        
    }
?>