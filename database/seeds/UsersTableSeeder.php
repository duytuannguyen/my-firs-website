<?php

use Illuminate\Database\Seeder;
use App\User;
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for($i = 1; $i < 40 ; $i++){
        	User::create([
        		'name' => $faker->name,
        		'email' => $faker->unique()->email,
        		'password' =>bcrypt('tuantuan'),

        	]);
        }
    }
}
