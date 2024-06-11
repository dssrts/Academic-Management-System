<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AysemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $academicYears = [2023, 2024, 2025];
        $entryCount = 0;

        foreach ($academicYears as $year) {
            if ($entryCount >= 6) {
                break;
            }

            // First Semester
            if ($entryCount < 6) {
                DB::table('aysems')->insert([
                    'academic_year' => $year,
                    'academic_year_code' => $year . '-' . ($year + 1),
                    'semester' => 1,
                    'academic_year_sem' => $year . '-' . ($year + 1) . ' First Semester',
                    'date_start' => Carbon::create($year, 1, 1),
                    'date_end' => Carbon::create($year, 6, 30),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
                $entryCount++;
            }

            // Second Semester
            if ($entryCount < 6) {
                DB::table('aysems')->insert([
                    'academic_year' => $year,
                    'academic_year_code' => $year . '-' . ($year + 1),
                    'semester' => 2,
                    'academic_year_sem' => $year . '-' . ($year + 1) . ' Second Semester',
                    'date_start' => Carbon::create($year, 7, 1),
                    'date_end' => Carbon::create($year, 12, 31),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
                $entryCount++;
            }
        }
    }
}
