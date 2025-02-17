<?php

namespace App\Services;

class RaceCalculator {

    public function start($turkeys) {
        
        foreach($turkeys as $turkey) {
            $className = 'App\Services\RaceCalculator\\' . $turkey->ability->strategy;
            
            $turkey->race_time = resolve($className, ['turkey' => $turkey])->calculate();
        }

        return $turkeys->sortBy('race_time');
    }
}