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
        $employeeIds = [];

        foreach (range(1, 100) as $index) {
            $usertype = $faker->randomElement(['student', 'employee']);
            $id = $faker->unique()->numberBetween(202300001, 202400100);
            DB::table('login_users')->insert([
                'id' => $id,
                'password' => Hash::make('password'),
                'role_id' => $faker->numberBetween(0, 10),
                'usertype' => $usertype,
                'active' => $faker->randomElement(['0', '1']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            if ($usertype === 'employee') {
                $employeeIds[] = $id;
            }
        }

        // Pass employeeIds to EmployeesTableSeeder
        $this->callWith(EmployeesTableSeeder::class, ['employeeIds' => $employeeIds]);
    }
}
