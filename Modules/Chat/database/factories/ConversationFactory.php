<?php

namespace Modules\Chat\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Chat\Models\Conversation;

class ConversationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = Conversation::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'user_id1' => null, // Will be set in seeder
            'user_id2' => null, // Will be set in seeder
            'last_message_id' => null, // Will be set after creating messages
        ];
    }
} 