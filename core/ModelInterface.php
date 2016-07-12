<?php

namespace Groups;

interface ModelInterface
{
    public function connection(array $connectInfo);
    
    public function getRecords(string $select);
    
    public function saveRecords(string $table, array $cols, array $records) : bool;
}