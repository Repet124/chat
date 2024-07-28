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
			'username' => 'test',
			'name' => 'Super User TEst',
		]);

		$users = User::all();

		for ($i=0; $i < 20; $i++) {
			Message::factory()->for($users->random())->create();
		}
	}
}
