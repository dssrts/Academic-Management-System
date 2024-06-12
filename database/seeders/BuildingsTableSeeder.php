<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BuildingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $buildingNames = ['GV', 'GEE', 'GCA', 'GL', 'GK'];

        foreach ($buildingNames as $buildingName) {
            DB::table('buildings')->insert([
                'building_code' => $buildingName,
                'building_name' => $buildingName,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
