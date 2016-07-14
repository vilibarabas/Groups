<?php

namespace Groups\Utils;

class SearchGroup {
    public $groups = [];
    
    public function addGroup(Group $group) {
        
        $this->groups[] = $group;
    }
    
    public function searchAll(Group $group) {
        $words = $group->getInfo();
        $this->throughGroups($words, $group->getBasicKeyword()->keyword);
    }
    
    private function throughGroups(array $words, string $base_keyword) {
        
        foreach($this->groups as $group) {
            
            foreach($group->getInfo() as $gr_word) {
                
                foreach($words as $word) {
                    $wrd = explode(' ', $word->keyword);
                    
                    foreach($wrd as $w) {
                        if($this->comparKeyword($gr_word->keyword, $w)) {
                            $group->addKeyword($base_keyword, $word->fleg, $word->freqvency, $gr_word->fleg);
                        }
                    }
                }
            }
        }
    }
    
    public function search(Group $group) {
        $words = $group->getInfo();
       
        $this->throughGroups($words, $group->getBasicKeyword()->keyword);
    }
    
    private function comparKeyword(string $word1, string $word2) : bool{
        if(preg_match('~('.$word2.')~ms', $word1, $mat) || preg_match('~('.$word2.')~ms', $word1, $mat)) {
            return true;
        }
        
        return false;
    }
}