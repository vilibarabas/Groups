<?php

namespace Groups\Utils;


class Keyword {
    
    public $keyword;
    public $fleg;
    public $fleg_basic;
    public $freqvency;

    public function __construct(string $keyword, string $fleg, int $freq, string $fleg2 = '') {
        $this->keyword = $keyword;
        $this->fleg = $fleg;
        $this->freqvency = $freq;
        $this->fleg_basic = $fleg2;
    }
}