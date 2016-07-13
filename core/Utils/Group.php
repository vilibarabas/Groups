<?php

namespace Groups\Utils;

use Groups\GroupInterface;
use Keyword;

class Group implements GroupInterface{
    
    private $group = [
                      'BASIC_KEYWORD' => '',
                      'KEYWORD_LIST' => []
                      ];    
    
    public function getBasicKeyword() : string{
        return $this->group['BASIC_KEYWORD'];
    }
    
    public function setBasicKeyword(string $keyword) {
        $this->group['BASIC_KEYWORD'] = $keyword;
    }
    
    public function addKeyword(string $keyword, string $flag, int $freq) {
        
        if(!$this->hasKeyword($keyword)) {
            $this->group['KEYWORD_LIST'][] = new Keyword($keyword, $flag, $freq);   
        }
    }
    
    public function hasKeyword(string $keyword) : bool{
        foreach($this->group['KEYWORD_LIST'] as $item) {
            if($item->keyword === $keyword) {
                return true;
            }
        }
        
        return false;
    }
}