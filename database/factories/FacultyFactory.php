<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\College;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\faculty>
 */
class FacultyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $randomCode = College::inRandomOrder()->first()->Code;
        $id = College::where('id', $randomCode)->first();
        // echo $randomCollege;
        // $a = "1";
        return [
            'college_id' => College::inRandomOrder()->first()->id,
            'first_name' => $this->faker->firstName(),
            'middle_name' => $this->faker->name,
            'last_name' => $this->faker->lastName(),
        ];
    }
}
