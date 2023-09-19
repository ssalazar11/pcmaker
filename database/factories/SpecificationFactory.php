<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SpecificationFactory extends Factory
{
    public function definition(): array
    {
        return [
            'cpu' => $this->faker->randomElement(['ryzen7 5000 series', ' ryzen 7 4000 series']),
            'ram' => $this->faker->randomElement(['64GB', '32GB']),
            'HDD' => $this->faker->randomElement([' 2TB', ' 3TB']),
            'graphicCard'=> $this->faker->randomElement(['Nvidia3050', 'Nvidia3050ti']),

        ];
    }

}