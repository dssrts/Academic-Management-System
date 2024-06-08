<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class LoginUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 100) as $index) {
            DB::table('login_users')->insert([
                'id' => $faker->unique()->numberBetween(202300001, 202400100),
                'password' => Hash::make('password'),
                'role_id' => $faker->numberBetween(0, 10),
                'usertype' => $faker->randomElement(['student', 'employee']),
                'active' => $faker->randomElement(['0', '1']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
