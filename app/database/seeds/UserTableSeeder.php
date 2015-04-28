<?php

// Composer: "fzaninotto/faker": "v1.3.0"
// use Faker\Factory as Faker;

class UserTableSeeder extends Seeder {

	public function run()
	{
		// $faker = Faker::create();

		// foreach(range(1, 10) as $index)
		// {
		// 	UserTableSeeder::create([

		// 	]);
		// }
		User::create([
			'username' => 'tekon92',
			'password' => Hash::make('password'),
			'email' => 'tekon92@gmail.com',
			'status' => 'y',
			'active' => 'y'
			]);
	}

}