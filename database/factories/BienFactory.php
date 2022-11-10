<?php

namespace Database\Factories;

use App\Bien;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Tier; 

class BienFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Bien::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'image' => 'test.jpg',
            'tiers_id' => Tier::factory(), 
            'adresse' => $this->faker->address, 
            'localisation' => $this->faker->address, 
            'quartier' =>$this->faker->streetAddress , 
            'commune' => $this->faker->city 
        ];
    }
}
