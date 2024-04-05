<?php

namespace Database\Factories;

use App\Models\Department;
use App\Models\Subject;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\College;
use App\Models\Faculty;
use Carbon\Carbon;

class SubjectFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Subject::class;

    /**
     * Array of predefined subject titles.
     *
     * @var array
     */
    protected $subjectTitles = [
        'Mathematics',
        'Physics',
        'Biology',
        'Chemistry',
        'English Literature',
        'History',
        'Computer Science',
        'Psychology',
        'Sociology',
        'Economics',
        'Political Science',
        'Philosophy',
        'Anthropology',
        'Art History',
        'Geography',
        'Environmental Science',
        'Engineering',
        'Business Administration',
        'Marketing',
        'Accounting',
        'Finance',
        'Management',
        'Human Resources',
        'Information Technology',
        'Health Sciences',
        'Nursing',
        'Medicine',
        'Dentistry',
        'Pharmacy',
        'Biomedical Engineering',
        'Agricultural Science',
        'Architecture',
        'Urban Planning',
        'Linguistics',
        'Foreign Languages',
        'Education',
        'Music',
        'Drama/Theater',
        'Film Studies',
        'Communication Studies',
        'Journalism',
        'Law',
        'Criminal Justice',
        'Public Administration',
        'Social Work',
        'Religious Studies',
        'Physical Education',
        'Nutrition',
        'Hospitality Management',
        'Culinary Arts',
        'Astronomy',
        'Astrophysics',
        'Biochemistry',
        'Biotechnology',
        'Botany',
        'Cell Biology',
        'Cognitive Science',
        'Data Science',
        'Demography',
        'Ecology',
        'Ethics',
        'Forensic Science',
        'Genetics',
        'Gerontology',
        'Healthcare Administration',
        'Immunology',
        'Kinesiology',
        'Library Science',
        'Marine Biology',
        'Materials Science',
        'Microbiology',
        'Neuroscience',
        'Oceanography',
        'Paralegal Studies',
        'Peace Studies',
        'Public Health',
        'Quantitative Analysis',
        'Radiology',
        'Robotics',
        'Statistics',
        'Theatre Arts',
        'Urban Studies',
        'Veterinary Science',
        'Zoology',
        'Actuarial Science',
        'Astrobiology',
        'Behavioral Science',
        'Bioinformatics',
        'Cartography',
        'Criminology',
        'Developmental Psychology',
        'Endocrinology',
        'Entomology',
        'Epidemiology',
        'Ethnography',
        'Fashion Design',
        'Game Design',
        'Geology',
        'Horticulture',
        'Industrial Engineering',
        'Inorganic Chemistry',
        'International Relations',
        'Landscape Architecture',
        'Mechanical Engineering',
        'Meteorology',
        'Molecular Biology',
        'Nanotechnology',
        'Operations Research',
        'Paleontology',
        'Petroleum Engineering',
        'Political Economy',
        'Quantum Mechanics',
        'Renewable Energy',
        'Semiotics',
        'Structural Engineering',
        'Systems Engineering',
        'Tax Law',
        'Textile Design',
        'Transportation Engineering',
        'Wildlife Biology',
        'Xenobiology',
        'Yoga Studies',
        'Zeitgeist Studies'
    ];


    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $subjectTitle = $this->faker->randomElement($this->subjectTitles);
        // Generate subject code based on subject title (example logic)
        $subjectCode = strtoupper(substr(str_replace(' ', '', $subjectTitle), 0, 3)) . $this->faker->numberBetween(0, 9999);
        $randomDepartmentID = Department::inRandomOrder()->first()->id;
        $randomFacultyID = Faculty::inRandomOrder()->first()->id;
        $randomFaculty = Faculty::where('id',$randomFacultyID)->last_name;
        $randomDepartmentCollegeID = College::where('id',$randomDepartmentID)->first();
        return [
            'college_id' => $randomDepartmentCollegeID,
            'department_id' => $randomDepartmentID,
            'subject_code' => $subjectCode,
            'subject_title' => $subjectTitle,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'units' => $this->faker->numberBetween(1,3),
            'faculty' => $randomFaculty,
        ];
    }
}
