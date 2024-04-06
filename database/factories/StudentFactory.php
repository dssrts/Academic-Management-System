<?php

namespace Database\Factories;

use App\Models\Department;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

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

        // Generate student data
        $studentData = [
            'student_no' => date('Y') . '-' . $this->faker->unique()->numberBetween(10000, 99999),
            'first_name' => $first_name,
            'last_name' => $last_name,
            'middle_name' => $middle_name,
            'biological_sex' => $this->faker->randomElement(['Male', 'Female']),
            'birthdate' => $this->faker->dateTimeBetween('-30 years', '-18 years')->format('F j, Y'),
            'birthdate_city' => $this->faker->city,
            'religion' => $this->faker->randomElement(['Christianity', 'Islam', 'Hinduism', 'Buddhism', 'Other']),
            'civil_status' => $this->faker->randomElement(['Single', 'Married', 'Divorced', 'Widowed']),
            'student_type' => $this->faker->randomElement(['Regular', 'Irregular']),
            'registration_status' => $this->faker->randomElement(['Enrolled', 'Unenrolled']),
            'year_level' => $this->faker->numberBetween(1, 5),
            'department_id' => $user->department_id, // Assuming user has a department_id
            'college_id' => $user->college_id, // Assuming user has a college_id
            'plm_email' => $plm_email,
            'personal_email' => $personal_email,
            'mobile_no' => '0' . $this->faker->numberBetween(900000000, 999999999),
            'telephone_no' => $this->faker->phoneNumber,
            'academic_year' => $this->faker->randomElement(['2020-2021', '2019-2020', '2021-2022', '2022-2023', '2023-2024']),
            'permanent_address' => $randomNumbers . ' '. $randomLastName . ' St. ' . $randomCity,
            'user_id' => $user->id,
            'block' => $this->faker->numberBetween(1,10),
        ];

        return $studentData;
    }
}
