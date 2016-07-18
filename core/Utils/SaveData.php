<?php

namespace Groups\Utils;

class SaveData{
    
    private $model = null;
    
    public function __construct($connectInfo) {
        $this->model = new Model();
        $this->model->connection($connectInfo);
    }
    
    public function preparBasicKeywordFormList($group) {
        
        $info = $this->prepInfo($group->getData('INFO'));
        $info['keyword'] = $group->getData('BASIC_KEYWORD')->keyword;
        $info['freq'] = $group->getData('BASIC_KEYWORD')->freqvency;
        
        
        $this->saveData('grouped_basic_keywords', $info);
    }
    
    public function saveData(string $table, array $info) {
        $this->model->saveRecords($table, $info);
    }
    
    private function prepInfo($info) {
        
        $data = [];
        foreach($info as $key => $inf) {
            $data[$key] = implode('#', $inf);
        }
        
        return $data;
    }
}