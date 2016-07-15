<?php

namespace Groups\Utils;

use Groups\GroupInterface;

class Group implements GroupInterface{
    
    public $group = [
                      'BASIC_KEYWORD' => null,
                      'KEYWORD_LIST' => [],
                      'INFO' => [],
                      'FORM_LIST' => []
                      ];    
    
    public function getBasicKeyword(){   
        return $this->group['BASIC_KEYWORD'];
    }
    
    public function getInfo(){
        return $this->group['FORM_LIST'];
    }
    
    
    public function getInfoList() {
        $words = [];
        $words[] = $this->getBasicKeyword();        
        $freq = $words[0]->freqvency;
        $infos = $this->group['INFO'];
        
        foreach($infos as $key => $info) {
            foreach($info as $inf) {
                $words[] = new Keyword($inf, $key, $freq);
            }
        }
        
        $this->group['FORM_LIST'] = $words;
    }
    
    public function setBasicKeyword(string $keyword, string $flag, int $freq) {
        
        $this->group['BASIC_KEYWORD'] = new Keyword($keyword, $flag, $freq);
    }
    
    public function addKeyword(string $keyword, string $flag, int $freq, string $flag2 = '') {
        
        if(!$this->hasKeyword($keyword)) {
            $this->group['KEYWORD_LIST'][] = new Keyword($keyword, $flag, $freq, $flag2);   
        }
    }
    
    public function addFormList(string $keyword, string $flag, int $freq) {
       
        $this->group['FORM_LIST'][] = new Keyword($keyword, $flag, $freq);   
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
            if(is_array($ar))
            foreach($ar as $key => $info) {
                if(is_array($info)) {
                    $this->setInfo($key, $info);   
                }
            }
        }
        
        $this->getInfoList();
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