<?php

namespace Groups\Utils;

use Groups\ModelInterface;
use Opis\Database\{Database, Connection};

class Model implements ModelInterface {
    private $connection = null;
    private $db = null;

    public function connection(array $connectInfo){
        if($this->connection == null)
            $this->connection = new Connection('mysql:host='. $connectInfo['host'].';dbname='. $connectInfo['db']. ';charset=utf8', $connectInfo['user'], $connectInfo['password']);
            
        $this->db = new Database($this->connection);
        
        return $this->db;
    }
    
    public function getRecords(string $table, array $records = [], int $limit = null) {
        
        if(empty($records)) {
        
            if($limit) {
                $result = $this->db->from($table)
                 ->limit($limit)
                 ->select()
                 ->all();
            }
            else {
                $result = $this->db->from($table)
                 ->select()
                 ->all();    
            }
            
        }
        else {
            if($limit) {
                $result = $this->db->from($table)
                 ->limit($limit)
                 ->select($records)
                 ->all();
            }
            else {
                $result = $this->db->from($table)
                 ->where()
                 ->select($records)
                 ->all();    
            }
        }
        return $result;
    }
    
    public function saveRecords(string $table, array $cols, array $records) : bool {
        return true;
    }
}