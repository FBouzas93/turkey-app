<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Turkey;
use App\Models\Ability;
use Illuminate\Support\Carbon;
use PHPUnit\Framework\Attributes\Test;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;

class TurkeyTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function it_can_create_a_turkey()
    {
        $data = [
            'name' => 'Alan',
            'status' => 'healthy',
            'weight' => 6.7,
            'birthdate' => Carbon::now(),
        ];

        $turkey = Turkey::create($data);

        $this->assertDatabaseHas('turkeys', $data);
        $this->assertInstanceOf(Turkey::class, $turkey);
    }

    #[Test]
    public function the_turkey_may_have_an_special_ability()
    {
        Artisan::call('db:seed');

        $turkey = Turkey::factory()->create();

        $this->assertInstanceOf(Ability::class, $turkey->ability);
    }
}
