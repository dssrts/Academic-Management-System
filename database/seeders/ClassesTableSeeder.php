<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ClassesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $courseIds = DB::table('courses')->pluck('id')->toArray();
        foreach (range(1, 12) as $index) {
            DB::table('classes')->insert([
                'students_qty' => $faker->numberBetween(10, 50),
                'credited_units' => $faker->numberBetween(1, 5),
                'actual_units' => $faker->numberBetween(1, 5),
                'slots' => $faker->numberBetween(20, 50),
                'nstp_activity' => $faker->optional()->word,
                'parent_class_code' => $faker->optional()->word,
                'link_type' => $faker->optional()->word,
                'instruction_language' => 'English',
                'minimum_year_level' => $faker->optional()->numberBetween(1, 4),
                'teams_assigned_link' => $faker->optional()->url,
                'effectivity_dateSL' => $faker->optional()->date,
                'created_at' => now(),
                'updated_at' => now(),
                'course_id' => $faker->randomElement($courseIds),
                'aysem_id' => $faker->numberBetween(1, 10),
                'block_id' => $faker->numberBetween(1, 5),
            ]);
        }
    }
}
