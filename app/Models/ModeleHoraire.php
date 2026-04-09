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
    }
?>