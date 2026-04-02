<?php
    namespace App\Models;
    use CodeIgniter\Model;
    class modeleLiaisons extends Model
    {
        protected $table = 'liaison';
        /* ci-dessus on indique la table a 'mapper' */
        protected$primaryKey = 'noliaison'; // clé primaire
        protected $useAutoIncrement = true;
        protected $returnType = 'object'; // résultats retournés sous forme d'objet(s)
        protected $allowedFields = ['noport_depart', 'nosecteur','noport_arrivee', 'distance'];
    
        public function getliaisonsecteur()
        {
            return $this->select('secteur.nom AS nomsecteur , port_depart.NOM AS portdepart , port_arrivee.NOM AS portarrivee , liaison.NOLIAISON, liaison.DISTANCE')
                    ->join('port as port_depart', 'port_depart.noport = liaison.noport_depart')
                    ->join('port as port_arrivee', 'port_arrivee.noport = liaison.noport_arrivee')
                    ->join('secteur', 'secteur.nosecteur = liaison.nosecteur')
                    ->getresult();
        }
    }
?>