<?php

namespace Modules\Chat\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Chat\Models\Message;

class MessageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = Message::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'message' => $this->faker->paragraph(),
            'sender_id' => null, // Will be set in seeder
            'group_id' => null, // Will be set in seeder
            'conversation_id' => null,
            'receiver_id' => null,
        ];
    }
}

