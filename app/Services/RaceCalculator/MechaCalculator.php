<?php

namespace App\Services\RaceCalculator;

class MechaCalculator extends BaseCalculator {

    public function calculate() {
        $this->speed *= 1.3;

        $this->turkey->weight *= 1.3;

        return parent::calculate();
    }
}