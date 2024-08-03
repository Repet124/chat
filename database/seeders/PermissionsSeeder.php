<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionsSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 */
	public function run(): void {
		Permission::create(['name' => 'read messages']);
		Permission::create(['name' => 'write messages']);

		$memberRole = Role::create(['name' => 'member']);

		$memberRole->givePermissionTo('read messages');
		$memberRole->givePermissionTo('write messages');

		$superAdminRole = Role::create(['name' => 'super-admin']);
	}
}
