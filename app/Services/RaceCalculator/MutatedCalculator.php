<?php

namespace App\Services\RaceCalculator;

class MutatedCalculator extends BaseCalculator {

    public function calculate() {
        $this->speed *= 1.5;

        if (rand(0, 100) < 50) {
            $this->canRace = false;
        }

        return parent::calculate();
    }
}