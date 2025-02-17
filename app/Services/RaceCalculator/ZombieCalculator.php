<?php

namespace App\Services\RaceCalculator;

class ZombieCalculator extends BaseCalculator {

    public function calculate() {
        $randomFactor = rand(50, 150) / 100;

        $this->speed *= $randomFactor;

        return parent::calculate();
    }
}