<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class StudentRecordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Retrieve all student IDs from the students table
        $studentIds = DB::table('students')->pluck('id');
        
        // Define possible values for the status and semester
        $statuses = ['Enrolled', 'Completed', 'Withdrawn'];
        $semesters = ['1st Semester', '2nd Semester', 'Summer'];

        // Iterate over each student ID and create a corresponding student record
        foreach ($studentIds as $studentId) {
            $controlNo = rand(100000, 9999999);
            $status = $statuses[array_rand($statuses)];
            $schoolYear = rand(2020, 2025);
            $semester = $semesters[array_rand($semesters)];
            $dateEnrolled = now()->subDays(rand(0, 365 * 5));
            $gwa = round(rand(100, 500) / 100, 2); // Generate a GWA between 1.00 and 5.00

            DB::table('student_records')->insert([
                'student_id' => $studentId,
                'control_no' => $controlNo,
                'status' => $status,
                'school_year' => $schoolYear,
                'semester' => $semester,
                'date_enrolled' => $dateEnrolled,
                'gwa' => $gwa,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        $this->command->info("Successfully seeded student records for all students.");
    }
}
