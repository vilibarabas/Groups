<?php

namespace Groups;

interface ModelInterface
{
    public function connection(string $host, string $database, string $user, string $password);
    
    public function getRecords(string $select);
    
    public function saveRecords(string $table, array $cols, array $records) : bool;
}