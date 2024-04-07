<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GradesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Count the number of students and subjects
        $numStudents = DB::table('students')->count();
        $numSubjects = DB::table('subjects')->count();

        // Ensure there are students and subjects in the database
        if ($numStudents === 0 || $numSubjects === 0) {
            $this->command->info('No students or subjects found in the database.');
            return;
        }

        // Array of available grades
        $grades = [1.00, 1.25, 1.50, 1.75, 2.00, 2.25, 2.50, 2.75, 3.00, 5.00];

        // Loop through each student
        for ($i = 1; $i <= $numStudents; $i++) {
            // Get a random number of subjects for each student (between 10 and 30)
            $numAssignedSubjects = rand(15, 40);

            // Generate an array of unique subject IDs for the current student
            $subjectIds = range(1, $numSubjects);
            shuffle($subjectIds);
            $assignedSubjects = array_slice($subjectIds, 0, $numAssignedSubjects);

            // Insert grades for each assigned subject
            foreach ($assignedSubjects as $subjectId) {
                $grade = $grades[array_rand($grades)]; // Randomly select a grade from the available options
                $completionGrade = 3.00; // Set completion grade to 3.00
                $remarks = ($grade > 3.00) ? 'Failed' : 'Passed'; // Determine remarks based on grade
                $createdAt = now();
                $updatedAt = now();
                $year = rand(2020, 2024); // Randomly select a year between 2019 and 2024
                $suffix = rand(1, 2); // Randomly select a suffix '1' or '2' for the year
                $year .= $suffix; // Combine the year and the suffix

                DB::table('grades')->insert([
                    'student_id' => $i,
                    'subject_id' => $subjectId,
                    'grade' => $grade,
                    'completion_grade' => $completionGrade,
                    'remarks' => $remarks,
                    'year' => $year,
                    'created_at' => $createdAt,
                    'updated_at' => $updatedAt,
                ]);
            }
        }

        $this->command->info("Grades seeded successfully for $numStudents students and $numSubjects subjects.");
    }
}
