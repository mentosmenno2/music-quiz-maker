<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$user = new User();
		$user->name = 'Admin';
		$user->email = 'admin@domain.com';
		$user->password = Hash::make('password');
		$user->save();
		$user->assignRole('admin');

		$user = new User();
		$user->name = 'Demo User';
		$user->email = 'demouser@domain.com';
		$user->password = Hash::make('password');
		$user->save();
	}
}
