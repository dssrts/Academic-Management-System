<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

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
        $this->call(EmployeesTableSeeder::class);
        $this->call(AysemsTableSeeder::class);
        // Faculty::factory(100)->create();
        
        // Professor::factory()->count(300)->create();
        // User::factory(100)->create();
        // $this->call(RoleSeeder::class);
        // $this->call(ModelHasRoleSeeder::class);
        $this->call(StudentsTableSeeder::class);
        $this->call(StudentTermsTableSeeder::class);
       
        $this->call(ClassesTableSeeder::class);
        // ClassModel::factory()->count(100)->create();
        $this->call(GradesTableSeeder::class);
        $this->call(ClassSchedulesSeeder::class);
        // $this->call(ScheduleSeeder::class);
        $this->call(StudentClassesSeeder::class);

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
