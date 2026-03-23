<?php

namespace Database\Factories;

use App\Models\Professor;
use App\Models\College;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProfessorFactory extends Factory
{
    protected $model = Professor::class;

    public function definition()
    {
        return [
            'college_id' => College::inRandomOrder()->first()->id,
            'last_name' => $this->faker->lastName,
            'first_name' => $this->faker->firstName,
            'middle_name' => $this->faker->optional()->lastName,
            'pronouns' => $this->faker->optional()->randomElement(['he/him', 'she/her', 'they/them']),
            'plm_email' => $this->faker->unique()->safeEmail,
        ];
    }
}
