<?php

namespace Groups\Utils;

use Groups\ModelInterface;
use Opis\Database\{Database, Connection};

class Model implements ModelInterface {
    private $connection = null;
    private $db = null;

    public function connection(array $connectInfo){
        if($this->connection == null)
            $this->connection = new Connection($connectInfo['host'], $connectInfo['user'], $connectInfo['password']);
            
        $this->db = new Database($this->connection);
        
        return $this->db;
    }
    
    public function getRecords(string $table, array $records = []) {
        
        if(empty($records)) {
            
        $result = $this->db->from($table)
             ->select()
             ->all();
        }
        else {
            $result = $this->db->from($table)
             ->select($records)
             ->all();
        }

    }
    
    public function saveRecords(string $table, array $cols, array $records) : bool {
        return true;
    }
}