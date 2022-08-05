<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TeamFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'          => $this->faker->unique()->company(),
            'logo'          => 'https://picsum.photos/536/354',
            'founded_in'    => rand(1850, 2022),
            'hq_address'    => $this->faker->unique()->streetName(),
            'hq_city'       => $this->faker->city()
        ];
    }
}
