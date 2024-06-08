<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class GradesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        // Fetch all student numbers from the students table
        $studentNumbers = DB::table('students')->pluck('student_no')->toArray();
        $classIds = DB::table('classes')->pluck('id')->toArray();

        foreach (range(1, 50) as $index) {
            DB::table('grades')->insert([
                'remarks' => $faker->sentence(3),
                'grade' => $faker->randomFloat(2, 1, 4),
                'completion_grade' => $faker->optional()->randomFloat(2, 1, 4),
                'submitted_date' => $faker->optional()->date(),
                'finalization_date' => $faker->optional()->date(),
                'created_at' => now(),
                'updated_at' => now(),
                'class_id' => $faker->randomElement($classIds), // Assuming you have classes
                'student_no' => $faker->randomElement($studentNumbers), // Get a random student_no from the students table
            ]);
        }
    }
}
