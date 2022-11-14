<?php

namespace Database\Factories;

use App\Espace;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Bien; 

class EspaceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Espace::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'bien_id' => Bien::factory(),
            'numero' => $this->faker->randomNumber(2, false), 
            'type' => $this->faker->randomElement($array = array (1, 2, 3)),
            'prix' => $this->faker->randomElement($array = array (40000 , 75000, 100000)), 
            'etat' => $this->faker->randomElement($array = array (1, 2)), 
        ];
    }
}
