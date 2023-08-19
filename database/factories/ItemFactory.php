<?php

namespace Database\Factories;

use App\Models\Item;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ItemFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Item::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'code' => $this->faker->text(255),
            'name' => $this->faker->name(),
            'type' => $this->faker->word(),
            'color' => $this->faker->hexcolor(),
            'quantity' => $this->faker->randomNumber(),
            'description' => $this->faker->sentence(15),
            'ex_date' => $this->faker->date(),
        ];
    }
}
