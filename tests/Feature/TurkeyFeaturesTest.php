<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Turkey;
use App\Models\Ability;
use Database\Seeders\AbilitySeeder;
use PHPUnit\Framework\Attributes\Test;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TurkeyFeaturesTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(AbilitySeeder::class);
    }
    
    #[Test]
    public function the_home_page_should_list_all_turkeys(): void
    {
        $turkeys = Turkey::factory(3)->create();

        $response = $this->get('/turkeys');
        
        $response->assertSeeInOrder($turkeys->pluck('name')->toArray());
    }

    #[Test]
    public function a_newly_created_turkey_cannot_weight_more_than_15_kgs(): void
    {
        $turkey = Turkey::factory()->make([
            'weight' => 25
        ])->toArray();

        $this->withExceptionHandling()->post('/turkeys', $turkey)
            ->assertSessionHasErrors('weight');
    }

    #[Test]
    public function a_dead_turkey_cant_race(): void
    {
        $turkey = Turkey::factory()->create([
            'status' => 'dead'
        ]);

        $this->get('/turkeys/race')
            ->assertSee('inf seconds');
    }

    #[Test]
    public function a_turkey_with_speed_boost_runs_20_percent_faster(): void
    {
        $turkey = Turkey::factory()->create([
            'weight' => 5,
            'status' => 'healthy',
            'ability_id' => Ability::whereName('BoostSpeed')->first()->id,
        ]);

        $estimatedTime = number_format(100 / (5 * 1.2), 2);

        $this->get('/turkeys/race')->assertSee($estimatedTime . ' seconds');
    }
}
