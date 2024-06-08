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

        // Possible grades
        $grades = [1, 1.25, 1.75, 2, 2.25, 2.5, 2.75, 3, 5];

        foreach (range(1, 50) as $index) {
            $grade = $faker->randomElement($grades);
            $remarks = ($grade <= 3) ? 'passed' : 'failed';

            DB::table('grades')->insert([
                'remarks' => $remarks,
                'grade' => $grade,
                'completion_grade' => $faker->optional()->randomElement($grades),
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
