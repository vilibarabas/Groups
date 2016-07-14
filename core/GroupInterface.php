<?php

namespace Groups;

interface GroupInterface {
    
    public function getBasicKeyword();
    
    public function setBasicKeyword(string $keyword, string $flag, int $freq);
    
    public function addKeyword(string $keyword, string $flag, int $freq, string $flag2 = '');
    
    public function hasKeyword(string $keyword) : bool;
    
}