<?php

namespace Groups\Utils;

use Groups\ModelInterface;

class Model implements ModelInterface {
    
    public function connection(string $host, string $database, string $user, string $password){
        
    }
    
    public function getRecords(string $select) {
        
    }
    
    public function saveRecords(string $table, array $cols, array $records) : bool {
        return true;
    }
}