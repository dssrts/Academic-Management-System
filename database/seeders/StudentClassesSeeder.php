<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentClassesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Get all students and classes
        $students = DB::table('students')->pluck('student_no');
        $classes = DB::table('classes')->get(['id', 'course_id']);

        foreach ($students as $student_no) {
            foreach ($classes as $class) {
                // Insert into student_classes table
                DB::table('student_classes')->insert([
                    'student_no' => $student_no,
                    'class_id' => $class->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                // Insert into course_sfe_students table
                DB::table('course_sfe_students')->insert([
                    'student_no' => $student_no,
                    'course_id' => $class->course_id,
                    'status' => true, // or false, depending on your default logic
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
