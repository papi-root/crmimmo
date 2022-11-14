<?php

namespace Database\Factories;

use App\Acquisition;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Tier;
use App\Bien; 
use App\Espace; 

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
            'tiers_id' => Tier::factory(),
            'espace_id' => Espace::factory(), 
            'date' => $this->faker->date('Y-m-d'), 
            'date_fin' => NULL, 
            'duree' => $this->faker->numberBetween(1, 24),
            'type' => rand(1, 2),
            'etat' => $this->faker->randomElement($array = array(1, 2, 3)), 
        ];
    }
}
