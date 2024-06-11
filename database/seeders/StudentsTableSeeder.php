<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class StudentsTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        // Get student login users
        $studentLoginUsers = DB::table('login_users')->where('usertype', 'student')->pluck('id')->toArray();
        $usedStudentNos = [];

        foreach ($studentLoginUsers as $studentLoginUser) {
            $studentNo = $studentLoginUser;
            $usedStudentNos[] = $studentNo;

            // Create students from login_users
            DB::table('students')->insert([
                'student_no' => $studentNo,
                'last_name' => $faker->lastName,
                'first_name' => $faker->firstName,
                'middle_name' => $faker->lastName,
                'maiden_name' => $faker->optional()->lastName,
                'suffix' => $faker->optional()->suffix,
                'birthdate' => $faker->date('Y-m-d', '2007-12-31'),
                'permanent_address' => $faker->address,
                'pedigree' => $faker->optional()->word,
                'religion' => $faker->randomElement(['Christian', 'Muslim', 'Iglesia ni Cristo', 'Born Again Christian']),
                'personal_email' => $faker->unique()->safeEmail,
                'mobile_no' => $faker->numerify('09#########'),
                'telephone_no' => $faker->optional()->phoneNumber,
                'photo_link' => $faker->optional()->imageUrl(),
                'entry_date' => $faker->date('Y-m-d', '2024-06-06'),
                'plm_email' => $faker->unique()->safeEmail,
                'paying' => $faker->boolean,
                'password' => Hash::make('password'),
                'graduation_date' => $faker->optional()->date('Y-m-d', '2027-06-01'),
                'height' => $faker->optional()->numberBetween(150, 200),
                'weight' => $faker->optional()->numberBetween(50, 100),
                'complexion' => $faker->optional()->word,
                'blood_type' => $faker->optional()->randomElement(['A', 'B', 'AB', 'O']),
                'dominant_hand' => $faker->optional()->randomElement(['left', 'right']),
                'medical_history' => $faker->optional()->sentence,
                'lrn' => $faker->optional()->numerify('#########'),
                'school_name' => $faker->company,
                'school_address' => $faker->address,
                'school_type' => $faker->randomElement(['Public', 'Private']),
                'strand' => $faker->optional()->randomElement(['STEM', 'ABM', 'HUMSS']),
                'year_entered' => $faker->numberBetween(2018, 2022),
                'year_graduated' => $faker->numberBetween(2022, 2024),
                'honors_awards' => $faker->optional()->sentence,
                'general_average' => $faker->optional()->randomFloat(2, 75, 99),
                'remarks' => $faker->optional()->sentence,
                'org_name' => $faker->optional()->company,
                'org_position' => $faker->optional()->jobTitle,
                'previous_tertiary' => $faker->optional()->company,
                'previous_sem' => $faker->optional()->word,
                'father_last_name' => $faker->lastName,
                'father_first_name' => $faker->firstName,
                'father_middle_name' => $faker->lastName,
                'father_address' => $faker->address,
                'father_contact_no' => $faker->phoneNumber,
                'father_office_employer' => $faker->company,
                'father_office_address' => $faker->address,
                'father_office_num' => $faker->phoneNumber,
                'mother_lastname' => $faker->lastName,
                'mother_first_name' => $faker->firstName,
                'mother_middle_name' => $faker->lastName,
                'mother_address' => $faker->address,
                'mother_contact_no' => $faker->phoneNumber,
                'mother_office_employer' => $faker->company,
                'mother_office_address' => $faker->address,
                'mother_office_num' => $faker->phoneNumber,
                'guardian_lastname' => $faker->lastName,
                'guardian_first_name' => $faker->firstName,
                'guardian_middle_name' => $faker->lastName,
                'guardian_address' => $faker->address,
                'guardian_contact_no' => $faker->phoneNumber,
                'guardian_office_employer' => $faker->company,
                'guardian_office_address' => $faker->address,
                'guardian_office_num' => $faker->phoneNumber,
                'annual_family_income' => $faker->optional()->numberBetween(100000, 1000000),
                'created_at' => now(),
                'updated_at' => now(),
                'biological_sex_id' => $faker->numberBetween(1, 2),
                'civil_status_id' => $faker->numberBetween(1, 2),
                'citizenship_id' => $faker->numberBetween(1, 5),
                'city_id' => $faker->numberBetween(1, 20),
                'birthplace_city_id' => $faker->numberBetween(1, 20),
                'aysem_id' => $faker->numberBetween(117, 120),
                'degree_program_id' => $faker->optional()->randomElement(['BSCS', 'BSIT', 'BSECE']),
                'registration_status_id' => $faker->optional()->randomElement(['Regular', 'Irregular']),
            ]);
        }

        // Generate student terms for the generated students
        $employeeDepartments = DB::table('employees')->pluck('department_id')->toArray();
        $programIds = [];

        foreach ($employeeDepartments as $departments) {
            $departmentIds = json_decode($departments, true);
            if (is_array($departmentIds)) {
                $programIds = array_merge($programIds, DB::table('programs')->whereIn('id', $departmentIds)->pluck('id')->toArray());
            }
        }

        $programIds = array_unique($programIds);

        // Debug: Print the program IDs
        echo "Program IDs: ";
        print_r($programIds);

        foreach ($usedStudentNos as $studentNo) {
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
                'program_id' => !empty($programIds) ? $faker->randomElement($programIds) : null,
                'block_id' => $faker->numberBetween(1, 50),
                'registration_status_id' => $faker->numberBetween(1, 10),
            ]);
        }
    }
}
