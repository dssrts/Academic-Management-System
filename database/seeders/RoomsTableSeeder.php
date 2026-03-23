<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class RoomsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        // Fetch all building IDs
        $buildingIds = DB::table('buildings')->pluck('id')->toArray();

        foreach (range(1, 50) as $index) {
            DB::table('rooms')->insert([
                'room_number' => $faker->numberBetween(100, 999),
                'room_name' => $faker->word,
                'building_id' => $faker->randomElement($buildingIds),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
