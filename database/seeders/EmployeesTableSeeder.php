<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $loginUsersIds = DB::table('login_users')->pluck('id')->toArray();
        $usedEmployeeIds = [];

        foreach (range(1, 50) as $index) {
            // Get a unique employee_id
            do {
                $employeeId = $faker->randomElement($loginUsersIds);
            } while (in_array($employeeId, $usedEmployeeIds));

            $usedEmployeeIds[] = $employeeId;

            DB::table('employees')->insert([
                'employee_id' => $employeeId,
                'job_id' => $faker->numberBetween(1, 10),
                'employee_type' => $faker->word,
                'school_email' => $faker->unique()->safeEmail,
                'religion' => $faker->randomElement(['Christianity', 'Islam', 'Hinduism', 'Buddhism', 'Other']),
                'civil_status' => $faker->randomElement(['Single', 'Married', 'Divorced', 'Widowed']),
                'college_id' => json_encode([$faker->numberBetween(1, 10), $faker->numberBetween(1, 10)]),
                'department_id' => json_encode([$faker->numberBetween(1, 10)]),
                'is_college_head' => json_encode([0, 0, 0]),
                'is_department_head' => json_encode([$faker->boolean]),
                'first_name' => $faker->firstName,
                'middle_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'age' => $faker->randomFloat(2, 25, 60),
                'gender' => $faker->randomElement(['Male', 'Female', 'Would Rather Not say']),
                'personal_email' => $faker->unique()->safeEmail,
                'phone' => $faker->phoneNumber,
                'birth_date' => $faker->date(),
                'address' => $faker->address,
                'start_of_employment' => $faker->date(),
                'end_of_employment' => $faker->optional()->date(),
                'employee_history' => json_encode([
                    [
                        'name_of_company' => $faker->company,
                        'prev_position' => $faker->jobTitle,
                        'start_date' => $faker->date(),
                        'end_date' => $faker->date()
                    ],
                    [
                        'name_of_company' => $faker->company,
                        'prev_position' => $faker->jobTitle,
                        'start_date' => $faker->date(),
                        'end_date' => $faker->date()
                    ]
                ]),
                'vacation_credits' => $faker->randomFloat(2, 0, 30),
                'sick_credits' => $faker->randomFloat(2, 0, 30),
                'study_available_units' => $faker->optional()->numberBetween(1, 12),
                'teach_available_units' => $faker->optional()->numberBetween(1, 12),
                'current_position' => $faker->jobTitle,
                'is_faculty' => $faker->boolean,
                'salary' => $faker->randomFloat(2, 30000, 150000),
                'cto' => $faker->randomFloat(2, 0, 10),
                'active' => $faker->boolean,
                'emp_image' => null,
                'emp_diploma' => $faker->boolean,
                'emp_tor' => $faker->boolean,
                'emp_cert_of_trainings_seminars' => $faker->boolean,
                'emp_auth_copy_of_csc_or_prc' => $faker->boolean,
                'emp_auth_copy_of_prc_board_rating' => $faker->boolean,
                'emp_med_certif' => $faker->boolean,
                'emp_nbi_clearance' => $faker->boolean,
                'emp_psa_birth_certif' => $faker->boolean,
                'emp_psa_marriage_certif' => $faker->boolean,
                'emp_service_record_from_other_govt_agency' => $faker->boolean,
                'emp_approved_clearance_prev_employer' => $faker->boolean,
                'other_documents' => $faker->boolean,
                'approval' => $faker->boolean,
                'fines' => $faker->boolean,
                'report' => $faker->boolean,
                'book_management' => $faker->boolean,
                'role_management' => $faker->boolean,
                'patron_manage' => $faker->boolean,
                'spec' => $faker->word,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
