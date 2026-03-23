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

        // Fetch all combinations of student_no and class_id from student_classes table
        $studentClasses = DB::table('student_classes')->get(['class_id', 'student_no']);

        // Possible grades
        $grades = [1, 1.25, 1.75, 2, 2.25, 2.5, 2.75, 3, 5];

        foreach ($studentClasses as $studentClass) {
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
                'class_id' => $studentClass->class_id,
                'student_no' => $studentClass->student_no,
            ]);
        }
    }
}
