<?php

namespace App\Services\RaceCalculator;

class BoostSpeedCalculator extends BaseCalculator {
    public function calculate() {
        $this->speed *= 1.2;

        return parent::calculate();
    }
}