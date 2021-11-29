<?php

namespace Database\Factories;

use App\Models\Animal;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class AnimalFactory extends Factory
{
    protected $model = Animal::class;

    public function definition()
    {
        return [
			'name' => $this->faker->name,
			'type' => $this->faker->name,
			'description' => $this->faker->name,
			'image' => $this->faker->name,
        ];
    }
}
