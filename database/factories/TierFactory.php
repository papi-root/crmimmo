<?php

namespace Database\Factories;

use App\Tier;
use Illuminate\Database\Eloquent\Factories\Factory;

class TierFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Tier::class;

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
            'type_tiers' => $this->faker->randomElement($array = array(1, 2, 3)),
        ];
    }
}
