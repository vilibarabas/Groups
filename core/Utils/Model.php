<?php

namespace Groups\Utils;

use Groups\ModelInterface;
use Opis\Database\{Database, Connection};

class Model implements ModelInterface {
    private $connection = null;
    public function connection(array $connectInfo){
        if($this->connection == null)
            $this->connection = new Connection($connectInfo['host'], $connectInfo['user'], $connectInfo['password']);
        
        return $this->connection;
    }
    
    public function getRecords(string $select) {
        
    }
    
    public function saveRecords(string $table, array $cols, array $records) : bool {
        return true;
    }
}