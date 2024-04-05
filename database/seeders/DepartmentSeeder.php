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
                'BSEE' => 'Bachelor of Secondary Education major in English',
                'BSEM' => 'Bachelor of Secondary Education major in Mathematics',
                'BSEF' => 'Bachelor of Secondary Education major in Filipino',
                'BSES' => 'Bachelor of Secondary Education major in Sciences',
                'BSESS' => 'Bachelor of Secondary Education major in Social Studies',
                'BPE' => 'Bachelor of Physical Education',
            ],
            // College of Engineering and Technology (CET)
            'COE' => [
                'CE' => 'Civil Engineering',
                'EE' => 'Electrical Engineering',
                'ME' => 'Mechanical Engineering',
                'IE' => 'Industrial Engineering',
                'ChE' => 'Chemical Engineering',
                'SE' => 'Software Engineering',
                'CpE' => 'Computer Engineering',
                'EECE' => 'Electrical and Computer Engineering',
            ],
            // College of Humanities, Arts, and Social Sciences (CHASS)
            'CHASS' => [
                'BAH' => 'Bachelor of Arts in History',
                'BAE' => 'Bachelor of Arts in English',
                'BAP' => 'Bachelor of Arts in Psychology',
                'BAS' => 'Bachelor of Arts in Sociology',
                'BAF' => 'Bachelor of Arts in Fine Arts',
                'BAM' => 'Bachelor of Arts in Music',
                'BAJ' => 'Bachelor of Arts in Journalism',
                'BAL' => 'Bachelor of Arts in Literature',
                'BAA' => 'Bachelor of Arts in Anthropology',
                'BAC' => 'Bachelor of Arts in Communication',
            ],
            // College of Medicine (CM)
            'CM' => [
                'MD' => 'Doctor of Medicine',
                'DentD' => 'Doctor of Dental Medicine',
                'DO' => 'Doctor of Osteopathic Medicine',
                'DPM' => 'Doctor of Podiatric Medicine',
                'DC' => 'Doctor of Chiropractic',
                'OD' => 'Doctor of Optometry',
                'PharmD' => 'Doctor of Pharmacy',
                'DVM' => 'Doctor of Veterinary Medicine',
                'DDS' => 'Doctor of Dental Surgery',
                'PsyD' => 'Doctor of Psychology',
            ],

            // College of Nursing (CN)
            'CN' => [
                'BSN' => 'Bachelor of Science in Nursing',
                'MSN' => 'Master of Science in Nursing',
                'DNP' => 'Doctor of Nursing Practice',
                'PhD' => 'Doctor of Philosophy in Nursing',
                'RN' => 'Registered Nurse',
            ],
            
            // College of Physical Therapy (CPT)
            'CPT' => [
                'DPT' => 'Doctor of Physical Therapy',
                'MPT' => 'Master of Physical Therapy',
                'BSPT' => 'Bachelor of Science in Physical Therapy',
                'PTA' => 'Physical Therapist Assistant',
                'PT' => 'Physical Therapist',
            ],
            
            // College of Business (COB)
            'PLMBS' => [
                'BBA' => 'Bachelor of Business Administration',
                'BSBA' => 'Bachelor of Science in Business Administration',
                'MBA' => 'Master of Business Administration',
                'MSBA' => 'Master of Science in Business Analytics',
                'MAcc' => 'Master of Accountancy',
                'MSc' => 'Master of Science in Management',
                'PhD' => 'Doctor of Philosophy in Business Administration',
                'JD/MBA' => 'Juris Doctor/Master of Business Administration',
                'EMBA' => 'Executive Master of Business Administration',
                'DBA' => 'Doctor of Business Administration',
            ],

            // School of Government (SG)
            'SOG' => [
                'MPA' => 'Master of Public Administration',
                'MPP' => 'Master of Public Policy',
                'MA' => 'Master of Arts in Government',
                'MS' => 'Master of Science in Government',
                'JD' => 'Juris Doctor',
                'PhD' => 'Doctor of Philosophy in Public Administration',
                'EMPA' => 'Executive Master of Public Administration',
                'DBA' => 'Doctor of Business Administration',
                'LLM' => 'Master of Laws',
                'PGDip' => 'Postgraduate Diploma in Public Administration',
            ],
            
            // School of Public Health (SPH)
            'SPH' => [
                'MPH' => 'Master of Public Health',
                'DrPH' => 'Doctor of Public Health',
                'MHA' => 'Master of Health Administration',
                'MS' => 'Master of Science in Public Health',
                'MPA' => 'Master of Public Administration',
                'PhD' => 'Doctor of Philosophy in Public Health',
                'MSc' => 'Master of Science in Epidemiology',
                'MPH&TM' => 'Master of Public Health and Tropical Medicine',
                'MSW/MPH' => 'Master of Social Work/Master of Public Health',
                'DNP' => 'Doctor of Nursing Practice',
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
                    'title' => $departmentTitle,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
            }
        }
    }
}
