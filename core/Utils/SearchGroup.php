<?php

namespace Groups\Utils;

class SearchGroup {
    public $groups = [];
    
    public function addGroup(Group $group) {
        
        $this->groups[] = $group;
    }
}