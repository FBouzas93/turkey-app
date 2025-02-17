<?php

namespace App\Services\RaceCalculator;

use App\Models\Turkey;

abstract class BaseCalculator {
    public Turkey $turkey;

    public $speed = 5;

    public $raceLength = 100;

    public $canRace = true;

    protected $modifiers = [
        'adjustByHealth',
        'adjustByWeight'
    ];

    public function __construct($turkey) {
        $this->turkey = $turkey;
    }

    public function calculate() {
        if ($this->turkey->status === 'dead') {
            $this->canRace = false;
        }

        foreach($this->modifiers as $modifier) {
            if($this->canRace) {
                $this->$modifier();
            }            
        }
        
        return $this->canRace ? $this->raceLength / $this->speed : INF;
    }

    protected function adjustByHealth() {
        if ($this->turkey->status === 'injured') {
            $this->speed *= 0.9;
        }
    }

    protected function adjustByWeight() {
        if ($this->turkey->weight > 10) {
            $penalty = ($this->turkey->weight - 5) * 0.05;
            
            $this->speed *= (1 - $penalty);
        }
    }
}