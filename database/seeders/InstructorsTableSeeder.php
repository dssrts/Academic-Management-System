<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class InstructorsTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 50) as $index) {
            DB::table('instructors')->insert([
                'last_name' => $faker->lastName,
                'first_name' => $faker->firstName,
                'middle_name' => $faker->lastName,
                'maiden_name' => $faker->optional()->lastName,
                'instructor_code' => $faker->unique()->numerify('INST###'),
                'pedigree' => $faker->optional()->word,
                'birth_date' => $faker->date('Y-m-d', '1980-01-01'),
                'mobile_phone' => $faker->phoneNumber,
                'email_address' => $faker->unique()->safeEmail,
                'tin_number' => $faker->unique()->numerify('#########'),
                'gsis_number' => $faker->unique()->numerify('#########'),
                'street_address' => $faker->address,
                'zip_code' => $faker->postcode,
                'phone_number' => $faker->phoneNumber,
                'faculty_name' => $faker->company,
                'created_at' => now(),
                'updated_at' => now(),
                'birthplace_id' => $faker->numberBetween(1, 20),
                'city_id' => $faker->optional()->numberBetween(1, 20),
                'biological_sex_id' => $faker->numberBetween(1, 2),
                'civil_status_id' => $faker->numberBetween(1, 2),
                'college_id' => $faker->numberBetween(1, 5),
                'citizenship_id' => $faker->numberBetween(1, 5),
            ]);
        }
    }
}