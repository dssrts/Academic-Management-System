<?php

namespace Database\Seeders;
use Database\Seeders\CollegeSeeder;
use Database\Seeders\DepartmentSeeder;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Faculty;
use App\Models\Subject;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(CollegeSeeder::class);
        $this->call(DepartmentSeeder::class);
        Faculty::factory(100)->create();
        Subject::factory(100)->create();
        User::factory(50)->create();
        $this->call(RoleSeeder::class);

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
