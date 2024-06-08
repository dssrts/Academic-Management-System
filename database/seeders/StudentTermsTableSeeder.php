<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class StudentTermsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 50) as $index) {
            DB::table('student_terms')->insert([
                'student_type' => $faker->randomElement(['new', 'continuing', 'transfer']),
                'graduating' => $faker->boolean(),
                'graduated' => $faker->boolean(),
                'enrolled' => $faker->boolean(),
                'year_level' => $faker->numberBetween(1, 5),
                'created_at' => now(),
                'updated_at' => now(),
                'student_no' => $faker->numberBetween(202300000, 202399999),
                'aysem_id' => $faker->numberBetween(1, 100),
                'program_id' => $faker->numberBetween(1, 50),
                'block_id' => $faker->numberBetween(1, 50),
                'registration_status_id' => $faker->numberBetween(1, 10),
            ]);
        }
    }
}
