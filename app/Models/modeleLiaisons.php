<?php
    namespace App\Models;
    use CodeIgniter\Model;
    class ModeleLiaisons extends Model
    {
        protected $table = 'liaison';
        /* ci-dessus on indique la table a 'mapper' */
        protected$primaryKey = 'NOLIAISON'; // clé primaire
        protected $useAutoIncrement = true;
        protected $returnType = 'object'; // résultats retournés sous forme d'objet(s)
        protected $allowedFields = ['noport_depart', 'nosecteur','noport_arrivee', 'distance'];
    
       public function getentete($numliaison, $portarrive, $portdepart){
            return $this->select("l.NOLIAISON AS codeliaison, portd.NOM AS portdépart, porta.NOM AS portarrivé")
                    ->from('liaison l')
                    ->join('port porta', 'porta.NOPORT = l.NOPORT_ARRIVEE')
                    ->join('port portd', 'portd.NOPORT = l.NOPORT_DEPART')
                    ->where('l.NOLIAISON', $numliaison)
                    ->get()
                    ->getResult();
        }
        public function getliaisonsecteur()
        {
            return $this->select('secteur.nom AS nomsecteur , port_depart.NOM AS portdepart , port_arrivee.NOM AS portarrivee , liaison.NOLIAISON, liaison.DISTANCE')
                    ->join('port as port_depart', 'port_depart.noport = liaison.noport_depart')
                    ->join('port as port_arrivee', 'port_arrivee.noport = liaison.noport_arrivee')
                    ->join('secteur', 'secteur.nosecteur = liaison.nosecteur')
                    ->get()
                    ->getResult();
        }


    }
?>