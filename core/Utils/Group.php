<?php

namespace Groups\Utils;

use Groups\GroupInterface;

class Group implements GroupInterface{
    
    private $group = [
                      'BASIC_KEYWORD' => null,
                      'KEYWORD_LIST' => [],
                      'INFO' => []
                      ];    
    
    public function getBasicKeyword(){
        
        return $this->group['BASIC_KEYWORD'];
    }
    
    public function setBasicKeyword(string $keyword, string $flag, int $freq) {
        
        $this->group['BASIC_KEYWORD'] = new Keyword($keyword, $flag, $freq);
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
    
    public function preparInfo(array $array) {
        foreach($array as $ar) {
            
            foreach($ar as $key => $info) {
                if(is_array($info)) {
                    $this->setInfo($key, $info);   
                }
            }
        }
    }
    
    public function setInfo(string $info, array $val) {
        
        if(!empty($val)) {
            foreach($val as $v){
                if(is_array($v)) {
                    if(strlen($v[0]) > 1 && $v[0] !== $this->group['BASIC_KEYWORD']->keyword)
                        $this->group['INFO'][$info][] = $v[0];
                }
            }
        }
    }
}