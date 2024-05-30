<?php

namespace Database\Factories;

use App\Models\ClassModel;
use App\Models\Professor;
use App\Models\StudentRecord;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ClassModelFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ClassModel::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'student_record_id' => StudentRecord::inRandomOrder()->first()->id,
            'professor_id' => Professor::inRandomOrder()->first()->id,
            'code' => $this->faker->bothify('??###'),
            'section' => $this->faker->randomElement(['1', '2', '3', '4', '5']),
            'name' => $this->faker->sentence(3),
            'description' => $this->faker->randomElement(['desc1', 'desc2']),
            'units' => $this->faker->numberBetween(1, 5),
            'day' => $this->faker->randomElement(['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday']),
            'start_time' => $this->faker->time(),
            'end_time' => $this->faker->time(),
            'building' => $this->faker->randomElement(['GV', 'GL', 'GEE', 'GA', 'GK']),
            'room' => $this->faker->numberBetween(100, 500),
            'type' => $this->faker->randomElement(['Lecture', 'Lab']),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
