<?php

namespace Database\Seeders;

use App\Models\Ability;
use Illuminate\Database\Seeder;

class AbilitySeeder extends Seeder
{
    public function run()
    {
        $abilities = [
            'BoostSpeed',
            'Mecha',
            'Mutated',
            'Zombie'
        ];

        foreach ($abilities as $ability) {
            Ability::firstOrcreate(
                ['name' => $ability],
                ['strategy' => $ability . 'Calculator']
            );
        }
    }
}
