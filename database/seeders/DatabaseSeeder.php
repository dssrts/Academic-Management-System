<?php

namespace Database\Seeders;
use Database\Seeders\CollegeSeeder;
use Database\Seeders\DepartmentSeeder;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Faculty;
use App\Models\Student;
use App\Models\Subject;
use App\Models\User;
use App\Models\Grade;


class DatabaseSeeder extends Seeder
{   
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(CollegeSeeder::class);
        $this->call(DepartmentSeeder::class);
        Faculty::factory(70)->create();
        Subject::factory(500)->create();
        User::factory(100)->create();
        $this->call(RoleSeeder::class);
        $this->call(ModelHasRoleSeeder::class);
        Student::factory(User::where('account_type', 'Student')->count())->create();    
        $this->call(GradesSeeder::class);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
