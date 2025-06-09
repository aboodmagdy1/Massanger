<?php

namespace Modules\Chat\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Chat\Models\Group;

class GroupFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = Group::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->company(),
            'description' => $this->faker->sentence(),
            'owner_id' => 1, // Will be set in seeder
        ];
    }
}

