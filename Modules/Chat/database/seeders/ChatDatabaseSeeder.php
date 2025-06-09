<?php

namespace Modules\Chat\Database\Seeders;

use App\Models\User;
use Modules\Chat\Models\Group;
use Modules\Chat\Models\Message;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class ChatDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'is_admin' => true,
        ]);
        
        // Create 10 additional users
        $users = User::factory(10)->create();
        
        // Create 5 groups
        $groups = Group::factory(5)->create();
        
        // For each group
        foreach ($groups as $group) {
            // Randomly select 2-5 users for each group
            $groupUsers = $users->random(rand(2, 5));
            
            // Set the first user as the group owner
            $group->save();
            
            // Add users to the group
            $group->users()->attach($groupUsers->pluck('id'));
            
            // Create 200 messages for each group (5 groups * 200 = 1000 total messages)
            $messages = Message::factory(200)->create([
                'group_id' => $group->id,
                'sender_id' => fn() => $groupUsers->random()->id,
            ]);
            
            // Update group's last message
            if ($messages->isNotEmpty()) {
                $group->last_message_id = $messages->last()->id;
                $group->save();
            }
        }
    }
}
