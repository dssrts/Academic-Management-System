<?php

namespace Database\Factories;

use App\Models\StudentRecord;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentRecordFactory extends Factory
{
    protected $model = StudentRecord::class;

    public function definition()
    {
        return [
            // 'student_id' will be provided by the seeder
            'control_no' => $this->faker->unique()->numberBetween(1000, 9999),
            'status' => $this->faker->randomElement(['active', 'inactive', 'graduated']),
            'school_year' => $this->faker->year . '-' . ($this->faker->year + 1),
            'semester' => $this->faker->numberBetween(1, 2),
            'date_enrolled' => $this->faker->dateTimeBetween('-4 years', 'now'),
            'GWA' => $this->faker->randomFloat(2, 1.00, 5.00),
            
        ];
    }
}
