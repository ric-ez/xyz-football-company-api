<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PlayerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'      => $this->faker->name(),
            'height'    => rand(150, 180) . ' cm',
            'weight'    => rand(50, 200) . ' kg',
            'position'  => $this->faker->randomElement(['Penyerang', 'Gelandang', 'Bertahan', 'Penjaga Gawang']),
            'number'    => rand(1, 50)
        ];
    }
}
