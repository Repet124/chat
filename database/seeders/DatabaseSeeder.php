<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Message;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(2)->create();
        User::factory()->create([
            'name' => 'test',
        ]);

        $users = User::all();

        Message::factory(2)->for($users[0])->create();
        Message::factory(1)->for($users[2])->create();
        Message::factory(1)->for($users[0])->create();
        Message::factory(1)->for($users[1])->create();
        Message::factory(2)->for($users[2])->create();
    }
}
