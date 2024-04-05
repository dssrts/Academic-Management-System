<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CollegeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $colleges = [
            'CAUP' => 'College of Architecture and Urban Planning',
            'CED' => 'College of Education',
            'COE' => 'College of Engineering and Technology',
            'CHASS' => 'College of Humanities, Arts, and Social Sciences',
            'CM' => 'College of Medicine',
            'CN' => 'College of Nursing',
            'CPT' => 'College of Physical Therapy',
            'PLMBS' => 'College of Business',
            'SOG' => 'School of Government',
            'SPH' => 'School of Public Health',

        ];

        foreach ($colleges as $code => $title) {
            DB::table('colleges')->insert([
                'Code' => $code,
                'Title' => $title,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }

        
    }
}
