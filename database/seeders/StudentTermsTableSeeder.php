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
        $studentNos = DB::table('students')->pluck('student_no')->toArray();
        $usedStudentNos = [];
        
        // Get department_ids linked to employees
        $departmentIds = DB::table('employees')->pluck('department_id')->unique()->toArray();
        // Get programs linked to these department_ids
        $programs = DB::table('programs')->whereIn('id', $departmentIds)->pluck('id')->toArray();

        foreach (range(1, 50) as $index) {
            // Get a unique student_no
            do {
                $studentNo = $faker->randomElement($studentNos);
            } while (in_array($studentNo, $usedStudentNos));

            $usedStudentNos[] = $studentNo;

            // Ensure at least 5 student terms are linked to valid programs
            $programId = $faker->randomElement($programs);

            DB::table('student_terms')->insert([
                'student_type' => $faker->randomElement(['new', 'continuing', 'transfer']),
                'graduating' => $faker->boolean(),
                'graduated' => $faker->boolean(),
                'enrolled' => $faker->boolean(),
                'year_level' => $faker->numberBetween(1, 5),
                'created_at' => now(),
                'updated_at' => now(),
                'student_no' => $studentNo,
                'aysem_id' => $faker->numberBetween(1, 100),
                'program_id' => $programId,
                'block_id' => $faker->numberBetween(1, 50),
                'registration_status_id' => $faker->numberBetween(1, 10),
            ]);
        }
    }
}
