<?php

namespace Groups;

interface GroupInterface {
    
    public function getBasicKeyword() : string;
    
    public function setBasicKeyword(string $keyword);
    
    public function addKeyword(string $keyword, string $flag, int $freq);
    
    public function hasKeyword(string $keyword) : bool;
    
}