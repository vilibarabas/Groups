<?php

namespace Groups\Utils;

class SaveData{
    public function preparBasicKeywordFormList($group) {
        $info = prepInfo($group->group['INFO']);
        $info['keyword'] = $group->CL_KEYWORD;
        
        return $info;
    }
    
    private function prepInfo($info) {
        
        $data = [];
        foreach($info as $key => $inf) {
            $data[$key] = implode('#', $inf);
        }
        
        return $data;
    }
}