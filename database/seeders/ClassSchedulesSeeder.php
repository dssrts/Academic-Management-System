<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ClassSchedulesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $classIds = DB::table('classes')->pluck('id')->toArray();
        

        foreach ($classIds as $classId) {
            foreach (range(1, 5) as $index) {
                DB::table('class_schedules')->insert([
                    'day' => $faker->randomElement(['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday']),
                    'start_time' => $faker->time(),
                    'end_time' => $faker->time(),
                    'schedule_name' => $faker->word,
                    'created_at' => now(),
                    'updated_at' => now(),
                    'class_id' => $classId,
                    'class_mode_id' => $faker->randomElement([1, 2]),
                    'room_id' => $faker->randomElement([100,200,300,400]),
                ]);
            }
        }
    }
}
