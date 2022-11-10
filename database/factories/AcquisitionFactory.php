<?php

namespace Database\Factories;

use App\Acquisition;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Tiers;
use App\Bien; 

class AcquisitionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Acquisition::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'tiers_id' => Tiers::factory(),
            'bien_id' => Bien::factory(), 
            'date' => now(), 
            'type' => rand(1, 2)
        ];
    }
}
