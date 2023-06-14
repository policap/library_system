<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title'=>$this->faker->title(),
            'author'=>$this->faker->name(),
            'size'=>$this->faker->numberBetween(50,350),
            'shelf_id'=>$this->faker->numberBetween(1,\App\Models\Shelf::count()),
            'date'=>$this->faker->date('Y-m-d', random_int(100000,7000000))
        ];
    }
}
