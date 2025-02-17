<?php

namespace App\Http\Controllers;

use App\Models\Turkey;
use Illuminate\Http\Request;
use App\Services\RaceCalculator;

class RaceController extends Controller {

    public function start(RaceCalculator $raceCalculator) {
        $turkeys = Turkey::with('ability')->get();

        $results = $raceCalculator->start($turkeys);
        
        return view('race.results', compact('results'));
    }
}