<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\ClassModel;
use App\Models\Student;

class GradesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Count the number of students and classes
        $numStudents = Student::count();
        $numClasses = ClassModel::count();

        // Ensure there are students and classes in the database
        if ($numStudents === 0 || $numClasses === 0) {
            $this->command->info('No students or classes found in the database.');
            return;
        }

        // Array of available grades
        $grades = [1.00, 1.25, 1.50, 1.75, 2.00, 2.25, 2.50, 2.75, 3.00, 5.00];

        // Retrieve all student IDs
        $studentIds = Student::pluck('id')->toArray();

        // Retrieve all class IDs
        $classIds = ClassModel::pluck('id')->toArray();

        // Loop through each student
        foreach ($studentIds as $studentId) {
            // Get a random number of classes for each student (between 15 and 40)
            $numAssignedClasses = rand(15, 40);

            // Shuffle and get a subset of class IDs for the current student
            shuffle($classIds);
            $assignedClasses = array_slice($classIds, 0, $numAssignedClasses);

            // Insert grades for each assigned class
            foreach ($assignedClasses as $classId) {
                $grade = $grades[array_rand($grades)]; // Randomly select a grade from the available options
                $completionGrade = 3.00; // Set completion grade to 3.00
                $remarks = ($grade > 3.00) ? 'Failed' : 'Passed'; // Determine remarks based on grade
                $createdAt = now();
                $updatedAt = now();
                $year = rand(2020, 2024); // Randomly select a year between 2020 and 2024
                $suffix = rand(1, 2); // Randomly select a suffix '1' or '2' for the year
                $yearWithSuffix = $year . $suffix; // Combine the year and the suffix

                DB::table('grades')->insert([
                    // 'student_id' => $studentId,
                    'class_id' => $classId,
                    'grade' => $grade,
                    'completion_grade' => $completionGrade,
                    'remarks' => $remarks,
                    // 'year' => $yearWithSuffix,
                    'created_at' => $createdAt,
                    'updated_at' => $updatedAt,
                ]);
            }
        }

        $this->command->info("Grades seeded successfully for $numStudents students and $numClasses classes.");
    }
}
