<?php
namespace App\Model;

use Exception;
use App\Util\Database;

abstract class Model
{
    
    protected $db;

    protected $table;
    
    public function __construct()
    {
        //Vérification que la table demandée existe
        if (empty($this->table)) {
            
            throw new Exception('La table demandée n\'existe pas');
        }

        //Retourne une instance de PDO
        $this->db = Database::getInstance();
    }
}