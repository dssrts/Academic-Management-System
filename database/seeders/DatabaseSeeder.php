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
        // $this->call(CollegeSeeder::class);
        // $this->call(DepartmentSeeder::class);
        $this->call(LoginUsersSeeder::class);
        $this->call(InstructorsTableSeeder::class);
        // $this->call(EmployeesTableSeeder::class);
        // Faculty::factory(100)->create();
        
        // Professor::factory()->count(300)->create();
        // User::factory(100)->create();
        // $this->call(RoleSeeder::class);
        // $this->call(ModelHasRoleSeeder::class);
        $this->call(StudentsTableSeeder::class);
        // $this->call(StudentTermsTableSeeder::class);
       
        $this->call(ClassesTableSeeder::class);
        // ClassModel::factory()->count(100)->create();
        $this->call(GradesTableSeeder::class);
        $this->call(StudentClassesSeeder::class);
        $this->call(ClassSchedulesSeeder::class);
        // $this->call(ScheduleSeeder::class);

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}