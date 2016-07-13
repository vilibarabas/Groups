<?php

namespace Groups\Utils;


class Keyword {
    
    public $keyword;
    public $fleg;
    public $freqvency;

    public function __construct(string $keyword, string $fleg, int $freq) {
        $this->keyword = $keyword;
        $this->fleg = $fleg;
        $this->freqvency = $freq;
    }
}