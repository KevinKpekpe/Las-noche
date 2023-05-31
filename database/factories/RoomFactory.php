<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Room>
 */
class RoomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->sentence(rand(2,6));
        $prix = round($this->faker->numberBetween(1000, 100000) / 100, 2);
        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'content' => $this->faker->sentence(rand(4,10)),
            'image' => $this->faker->image('public/images/',600,500,'chambre',false,true,'jpg'),
            'price' => $prix,
            'numberofperson' => $this->faker->randomDigitNotNull(),
        ];
    }
}
