<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class StudentClassesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $studentTerms = DB::table('student_terms')->whereNotNull('program_id')->get();
        $classIds = DB::table('classes')->pluck('id')->toArray();

        foreach ($studentTerms as $studentTerm) {
            foreach (range(1, 5) as $index) {
                DB::table('student_classes')->insert([
                    'class_id' => $faker->randomElement($classIds),
                    'student_no' => $studentTerm->student_no,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
