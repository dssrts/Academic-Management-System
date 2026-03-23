<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ClassFacultySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        
        // Fetch all instructor IDs
        $instructorIds = DB::table('instructors')->pluck('id')->toArray();
        
        // Fetch all class IDs
        $classIds = DB::table('classes')->pluck('id')->toArray();

        foreach ($classIds as $classId) {
            DB::table('class_faculty')->insert([
                'class_id' => $classId,
                'instructor_id' => $faker->randomElement($instructorIds), // Pick random instructor_id
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
