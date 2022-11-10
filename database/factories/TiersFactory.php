<?php

namespace Database\Factories;

use App\Tiers;
use Illuminate\Database\Eloquent\Factories\Factory;

class TiersFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Tiers::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'nom_complet' => $this->faker->name,
            'adresse' => $this->faker->address, 
            'telephone' => $this->faker->phoneNumber(), 
            'email' => $this->faker->unique()->safeEmail(),
            'type_tiers' => rand(1,2),
        ];
    }
}
