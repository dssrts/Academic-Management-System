<?php

namespace Database\Factories;

use App\Models\Department;
use App\Models\User;
use App\Models\College;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \App\Models\Student::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // Retrieve all users with account_type equal to "Student"
        $studentUsers = User::where('account_type', 'Student')->get();

        // Store user IDs in an array
        $userIds = $studentUsers->pluck('id')->toArray();

        // Generate a random user ID from the array
        $userId = $this->faker->unique()->randomElement($userIds);

        // Retrieve the user based on the randomly chosen user ID
        $user = User::find($userId);

        // Extract first name and last name from the user's name
        $nameParts = explode(' ', $user->name);
        $first_name = $nameParts[0];
        $last_name = end($nameParts);

        // Generate a random middle name
        $middle_name = $this->faker->lastName();

        // Generate personal email and PLM email using first name and last name
        $personal_email = strtolower($first_name) . '@personal.com';
        $plm_email = strtolower($first_name) . '@plm.edu.ph';

        $randomNumbers = $this->faker->numberBetween(100, 999); // Generates a random three-digit number
        $randomLastName = $this->faker->lastName; // Generates a random last name
        $randomCity = $this->faker->city; // Generates a random city
        $citizenship = "Filipino"; // Generates a random city

        // Retrieve a random college
        $college = College::inRandomOrder()->first();

        // Retrieve a random department from the chosen college
        $department = Department::where('college_id', $college->id)->inRandomOrder()->first();
        $program_code = $department ? $department->code : null; // Assuming department has a program_code field

        $year = $this->faker->randomElement([2021, 2022, 2023, 2024]);
        $randomFiveDigits = str_pad($this->faker->unique()->numberBetween(1, 99999), 5, '0', STR_PAD_LEFT);
        $studentNo = (int)($year . $randomFiveDigits);

        // Generate student data
        $studentData = [
            'student_no' => $studentNo,
            'first_name' => $first_name,
            'last_name' => $last_name,
            'middle_name' => $middle_name,
            'biological_sex' => $this->faker->randomElement(['Male', 'Female']),
            'civil_status' => $this->faker->randomElement(['Single', 'Married', 'Divorced', 'Widowed']),
            'student_type' => $this->faker->randomElement(['Regular', 'Irregular']),
            'registration_status' => $this->faker->randomElement(['Enrolled', 'Unenrolled']),
            'year_level' => $this->faker->numberBetween(1, 5),
            'entry_aysem' => $this->faker->numberBetween(2020, 2024),
            'degree_program' => $department ? $department->department_id : null, // Use department ID
            'program_code' => $program_code,
            'college' => $college->id, // Use college ID
            'plm_email' => $plm_email,
            'citizenship' => $citizenship,
            'email' => $personal_email,
            'mobile_no' => '0' . $this->faker->numberBetween(900000000, 999999999),
            'permanent_address' => $randomNumbers . ' ' . $randomLastName . ' St. ' . $randomCity,
            'user_id' => $user->id,
        ];

        return $studentData;
    }
}
