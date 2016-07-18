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
        
        foreach($this->groups as $id => $group) {
            
            foreach($group->getInfo() as $gr_word) {
                $gasit = 0;
                $last = '';
                foreach($words as $word) {
                    $wrd = explode(' ', $word->keyword);
                    
                    foreach($wrd as $w) {
                        
                        if($this->comparKeyword($gr_word->keyword, $w) && $last  !== $gr_word->keyword) {
                            $gasit = 1;
                            $info['basic_id'] = $id +1;
                            $info['keyword'] = $base_keyword;
                            $info['flag'] = $word->fleg;
                            $info['flag_basic'] = $gr_word->fleg;
                            $info['freqvency'] = $word->freqvency;
                            $connectinfo = [
                                            'host' => '192.168.5.51',
                                            'db' => 'keyword_similars',
                                            'user' => 'root',
                                            'password' => 's2lte2m'
                                            ];
                            $save = new SaveData($connectinfo);
                            $save->saveData('grouped_keyword_list_2', $info);
                            #$group->addKeyword($base_keyword, $word->fleg, $word->freqvency, $gr_word->fleg);
                        }
                    }
                }
                if($gasit)  break;
            }
        }
    }
    
    public function search(Group $group) {
        $words = $group->getInfo();
       
        $this->throughGroups($words, $group->getBasicKeyword()->keyword);
    }
    
    private function comparKeyword(string $word1, string $word2) : bool{
        if(preg_match('~('.$word2.')~ms', $word1, $mat) || preg_match('~('.$word2.')~ms', $word1, $mat)) {
            if( strlen($mat[1]) >= 5) {
                return true;   
            }
        }
        return false;
    }
}