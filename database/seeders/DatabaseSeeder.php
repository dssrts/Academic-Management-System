<?php

namespace Database\Seeders;

use App\Models\ClassModel;
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
use App\Models\Professor;
use App\Models\StudentRecord;

class DatabaseSeeder extends Seeder
{   
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(CollegeSeeder::class);
        $this->call(DepartmentSeeder::class);
        // Faculty::factory(100)->create();
        Professor::factory()->count(100)->create();
        // Subject::factory(400)->create();
        User::factory(700)->create();
        // $this->call(RoleSeeder::class);
        // $this->call(ModelHasRoleSeeder::class);
        Student::factory(User::where('account_type', 'Student')->count())->create()->each(function ($student) {
            StudentRecord::factory()->create([
                'student_id' => $student->id,
                'control_no' => fake()->unique()->numberBetween(1000, 9999),
                'status' => fake()->randomElement(['active', 'inactive', 'graduated']),
                'school_year' => fake()->year . '-' . (fake()->year + 1),
                'semester' => fake()->numberBetween(1, 2),
                'date_enrolled' => fake()->dateTimeBetween('-4 years', 'now'),
                'GWA' => fake()->randomFloat(2, 1.00, 5.00),
                
            ]);
        });
        ClassModel::factory()->count(100)->create();
        $this->call(GradesSeeder::class);
        // $this->call(ScheduleSeeder::class);

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
