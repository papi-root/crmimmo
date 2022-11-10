<?php

namespace Database\Factories;

use App\Espace;
use Illuminate\Database\Eloquent\Factories\Factory;

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
            'numero' => $this->faker->Number, 
            'type' => rand(1,2), 
            'etat' => rand(0,1), 
        ];
    }
}
