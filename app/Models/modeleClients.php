<?php
    namespace App\Models;
    use CodeIgniter\Model;
    class ModeleClients extends Model
    {
        protected $table = 'client';
        /* ci-dessus on indique la table a 'mapper' */
        protected$primaryKey = 'noclient'; // clé primaire
        protected $useAutoIncrement = true;
        protected $returnType = 'object'; // résultats retournés sous forme d'objet(s)
        protected $allowedFields = ['nom', 'prenom', 'adresse', 'codepostal', 'ville', 'telephonefixe', 'telephonemobile', 'mel', 'motdepasse'];
        
        
        public function getclient($noclient)
        {
            return $this->select('noclient, nom, prenom, adresse, codepostal, ville, telephonefixe, telephonemobile, mel')
                    ->where('noclient', $noclient)
                    ->get()
                    ->getResult();
        }
    }
?>