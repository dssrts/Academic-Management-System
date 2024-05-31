<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Associate each department with its respective college
        $departments = [
            // College of Architecture and Urban Planning (CAUP)
            'CAUP' => [
                'BSA' => 'Bachelor of Science in Architecture',
            ],
            // College of Education (CED)
            'CED' => [
                'BOEE' => 'Bachelor of Elementary Education',
                'BOECE' => 'Bachelor of Early Childhood Education',
                'BSNE' => 'Bachelor of Special Needs Education',
            ],
            // College of Engineering and Technology (CET)
            'COE' => [
                'BSCE' => 'Bachelor of Science in Civil Engineering',
                'BSEE' => 'Bachelor of Science in Electrical Engineering',
                'BSME' => 'Bachelor of Science in Mechanical Engineering',
            ],
            // College of Humanities, Arts, and Social Sciences (CHASS)
            'CHASS' => [
                'BAH' => 'Bachelor of Arts in History',
                'BAP' => 'Bachelor of Arts in Psychology',
                'BAS' => 'Bachelor of Arts in Sociology',
            ],
            // College of Medicine (CM)
            'CM' => [
                'MD' => 'Doctor of Medicine',
                'DentD' => 'Doctor of Dental Medicine',
                'DO' => 'Doctor of Osteopathic Medicine',
            ],

            // College of Nursing (CN)
            'CN' => [
                'BSN' => 'Bachelor of Science in Nursing',
                'MSN' => 'Master of Science in Nursing',
                'DNP' => 'Doctor of Nursing Practice',
            ],
            
            // College of Physical Therapy (CPT)
            'CPT' => [
                'DPT' => 'Doctor of Physical Therapy',
                'MPT' => 'Master of Physical Therapy',
                'PTA' => 'Physical Therapist Assistant',
            ],
            
            // College of Business (COB)
            'PLMBS' => [
                'BBA' => 'Bachelor of Business Administration',
                'BSBA' => 'Bachelor of Science in Business Administration',
                'MBA' => 'Master of Business Administration',
            ],

            // School of Government (SG)
            'SOG' => [
                'MPA' => 'Master of Public Administration',
                'MPP' => 'Master of Public Policy',
                'MA' => 'Master of Arts in Government',
            ],
            
            // School of Public Health (SPH)
            'SPH' => [
                'MPH' => 'Master of Public Health',
                'DrPH' => 'Doctor of Public Health',
                'MHA' => 'Master of Health Administration',
            ],
        ];

        // Iterate through each department and insert into the departments table
        foreach ($departments as $collegeCode => $collegeDepartments) {
            // Get the college ID based on the code
            $collegeId = DB::table('colleges')->where('Code', $collegeCode)->value('id');

            foreach ($collegeDepartments as $departmentCode => $departmentTitle) {
                DB::table('departments')->insert([
                    'college_id' => $collegeId,
                    'code' => $departmentCode,
                    'department_name' => $departmentTitle,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
            }
        }
    }
}
