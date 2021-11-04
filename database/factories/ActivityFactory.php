<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Activity;

class ActivityFactory extends Factory
{
    protected $model = Activity::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->address,
            'description' => $this->faker->text,
            'startAvailableDate' => $this->faker->dateTimeBetween('-5 days', 'now', null)->format('Y-m-d H:i:s'),
            'endAvailableDate' => $this->faker->dateTimeBetween('now', '+10 days', null)->format('Y-m-d H:i:s'),
            'price' => $this->faker->randomNumber(4),
        ];
    }
}
